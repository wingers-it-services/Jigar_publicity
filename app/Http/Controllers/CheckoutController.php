<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusCodeEnum;
use App\Models\Payment;
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

    /**
     * Model User
     */

    public function __construct(
        PhonePayPaymentServices $phonePayPaymentServices,
        Payment $payment
    ) {
        $this->phonePayPaymentServices =  $phonePayPaymentServices;
        $this->payment = $payment;
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
}
