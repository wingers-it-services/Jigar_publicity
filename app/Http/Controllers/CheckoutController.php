<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Enums\PaymentStatusCodeEnum;
use App\Models\Payment;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Services\PhonePayPaymentServices;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Service PhonePayPaymentServices
     */
    private $phonePayPaymentServices;

    /**
     * Model Order
     */
    private $payment;
    private $user;
    private $siteSetting;

    /**
     * Model User
     */

    public function __construct(
        PhonePayPaymentServices $phonePayPaymentServices,
        Payment $payment,
        User $user,
        SiteSetting $siteSetting
    ) {
        $this->phonePayPaymentServices =  $phonePayPaymentServices;
        $this->payment = $payment;
        $this->user=$user;
        $this->siteSetting=$siteSetting;
    }

    public function showCheckOutPage(Request $request)
    {
        $data = $request->all();
        $url = $this->phonePayPaymentServices->initialisePaymentWithTest($data);

        return $url;
    }

    public function response(Request $request)
    {
        try {
            $responseData = $request->all();
            $order = $this->payment->where('orderId',  $responseData['transactionId'])->first();

            if (!isset($order)) {
                Log::error('[CheckoutController][response] Invalid order ', [
                    'input' => $request,
                    'Error' => 'This order is not exist in our database.'
                ]);
                return 'Payment failed';
            }

            if ($responseData['code'] == PaymentStatusCodeEnum::PAYMENT_SUCCESS) {
                $invoiceView = view('user.invoice-order-success', [
                    'order'               => $order,
                    'providerReferenceId' => $responseData['providerReferenceId']
                ])->render();
                $order->update([
                    'response_code'       => $responseData['code'],
                    'merchantId'          => $responseData['merchantId'],
                    'providerReferenceId' => $responseData['providerReferenceId'],
                    'responseData'        => json_encode($responseData),
                    'invoice'             => $invoiceView,
                ]);
                $user = $order->user;
                if ($user) {
                    $user->payment_status = PaymentStatus::PAID;
                    $user->no_of_device = $order->no_of_device;
                    $user->no_of_hour = $order->number_of_hours;
                    $user->save();
                }

                return $invoiceView;
            } else if ($responseData['code'] == PaymentStatusCodeEnum::PAYMENT_ERROR) {
                $invoiceView = view('emailTemplate.invoice-order-failed ', [
                    'order'               => $order,
                    'providerReferenceId' => $responseData['providerReferenceId']
                ])->render();

                $order->update([
                    'response_code'       => $responseData['code'],
                    'merchantId'          => $responseData['merchantId'],
                    'providerReferenceId' => $responseData['providerReferenceId'],
                    'responseData'        => json_encode($responseData),
                    'invoice'             => $invoiceView,
                ]);
                return $invoiceView;
                Log::error('[CheckoutController][response] Payment failed ' . 'input' . $request);
                return redirect()->back()->with('status', 'error')->with('message', 'Payment Failed.');
            } else {
                $invoiceView = view('emailTemplate.invoice-order-pending', ['order' => $order])->render();
                $order->update([
                    'response_code'  => $responseData['code'],
                    'merchantId'     => $responseData['merchantId'],
                    'responseData'   => json_encode($responseData),
                    'invoice'        => $invoiceView,
                ]);
                return $invoiceView;
                Log::error('[CheckoutController][response] Payment Pending ' . 'input' . $request . 'responseData' . json_encode($responseData));
                return redirect()->back()->with('status', 'error')->with('message', 'Payment Pending.');
            }
            return redirect()->back()->with('status', 'success' . $order->id)->with('message', 'Project downloaded successfully.');
        } catch (\Throwable $e) {
            Log::error('Payment not done.' . 'Request=' . $request . 'Throwable=' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'Payment not done.');
        }
    }

    public function showPaymentPage()
    {
        $user = auth()->user();
        return view('user.payment', compact('user'));
    }

    public function calculatePrice(Request $request)
    {
        $numberOfDevices = $request->query('numberOfDevices');
        $numberOfHours = $request->query('numberOfHours');

        // Fetch site settings
        $siteSetting = $this->siteSetting->first();
        if (!$siteSetting) {
            return response()->json(['error' => 'Site settings not found.'], 500);
        }

        try {
            // Get the price per device per hour
            $pricePerDevicePerHour = $siteSetting->getPricePerDevicePerHour($numberOfDevices);

            // Calculate the total amount
            $totalPrice = $pricePerDevicePerHour * $numberOfHours;

            $igstPercentage = $siteSetting->igst; // Assume igst_percentage is stored in site settings

            // Calculate IGST
            $igstAmount = ($totalPrice * $igstPercentage) / 100;
            // Return calculated amount
            return response()->json(['amount' => $totalPrice, 'igst' => $igstAmount, 'price' => $pricePerDevicePerHour]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error calculating amount'], 500);
        }
    }

    public function getPaymentDetails($id)
    {
        $payment = $this->user->find($id);
        if ($payment) {
            return response()->json($payment);
        }
        return response()->json(['error' => 'Payment not found'], 404);
    }
}
