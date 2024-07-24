<?php

namespace App\Services;

use Illuminate\Http\Client\Request;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Ixudra\Curl\Facades\Curl;
use function GuzzleHttp\json_encode;

class PhonePayPaymentServices
{
    private $payment;
    private $user;
    private $merchant_id;
    private $saltKey;
    private $saltIndex;

    public function __construct(
        Payment $payment,
        User $user
    ) {
        $this->payment = $payment;
        $this->user = $user;
        $this->merchant_id = Config::get('app.merchant_id');
        $this->saltKey = Config::get('app.phonepay_salt_key');
        $this->saltIndex = (int) Config::get('app.phonepay_index_key');
    }

    public function initialisePaymentWithTest(array $data)
    {
        // dd($data);
        Log::info($data);
        $lastOrderId = $this->payment->latest('id')->value('id');
        $newOrderId = ($lastOrderId == null) ? 'WITS1' :  'W1' . ($lastOrderId + 1);
        $amount = $data['totalprice'] * 100;
        // $paymentData = [
        //     'merchantId'            =>  $this->merchant_id,
        //     'merchantTransactionId' =>  $newOrderId,
        //     'merchantUserId'        =>  'MUID123',
        //     'amount'                =>  $amount,
        //     'redirectUrl'           => route('response'),
        //     'redirectMode'          => 'POST',
        //     'callbackUrl'           => route('response'),
        //     'mobileNumber'          => $data['mobile'],
        //     'paymentInstrument'     =>
        //     [
        //         'type' => 'PAY_PAGE',
        //     ],
        // ];
        // $paymentData = [
        //     'merchantId'            =>  'PGTESTPAYUAT',
        //     'merchantTransactionId' =>  $newOrderId,
        //     'merchantUserId'        =>  'MUID123',
        //     'amount'                =>  $amount,
        //     'redirectUrl'           => route('response'),
        //     'redirectMode'          => 'POST',
        //     'callbackUrl'           => route('response'),
        //     'mobileNumber'          => $data['mobile'],
        //     'paymentInstrument'     =>
        //     [
        //         'type' => 'PAY_PAGE',
        //     ],
        // ];

        $paymentData = [
            'merchantId'            =>  'PGTESTPAYUAT86',
            'merchantTransactionId' =>  $newOrderId,
            'merchantUserId'        =>  'MUID123',
            'amount'                =>  $amount,
            'redirectUrl'           =>  route('response'),
            'redirectMode'          =>  'POST',
            'callbackUrl'           =>  route('response'),
            'mobileNumber'          => $data['mobile'],
            'paymentInstrument'     =>
            [
                'type' => 'PAY_PAGE',
            ],
        ];

        // dd($paymentData);
        $encode = base64_encode(json_encode($paymentData));

        // $string = $encode . '/pg/v1/pay' . $this->saltKey;

        // $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltKey='96434309-7796-489d-8924-ab56988a6076';
        $string = $encode . '/pg/v1/pay' . $saltKey;
        $sha256 = hash('sha256', $string);
        // $finalXHeader = $sha256 . '###' . $this->saltIndex;
        $saltIndex = 1;
        $finalXHeader = $sha256 . '###' . $saltIndex;

        $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay')
            ->withHeader('Content-Type: application/json')
            ->withHeader('X-VERIFY:' . $finalXHeader)
            ->withData(json_encode(['request' => $encode]))
            ->post();
            // dd($response);

        // $userId = $this->user->createGuestUser($data);
        $userId = $this->user->where('email', $data['email'])->first();
        $data['orderId'] = $newOrderId;
        $data['userId'] = $userId->id;
        Log::info($data['userId']);
        $this->payment->newOrder($data);
        Log::info($response);
        $rData = json_decode($response);
        $url = $rData->data->instrumentResponse->redirectInfo->url;
        return $url;
    }




    // public function initialisePaymentWithTest(array $data)
    // {
    //     $lastOrderId = $this->payment->latest('id')->value('id');
    //     $newOrderId = ($lastOrderId == null) ? 'WITS1' : 'W1' . ($lastOrderId + 1);
    //     $amount = $data['totalprice'] * 100;

    //     $paymentData = [
    //         'merchantId'            => 'PGTESTPAYUAT',
    //         'merchantTransactionId' => $newOrderId,
    //         'merchantUserId'        => 'MUID123',
    //         'amount'                => $amount,
    //         'redirectUrl'           => route('response'),
    //         'redirectMode'          => 'POST',
    //         'callbackUrl'           => route('response'),
    //         'mobileNumber'          => $data['mobile'],
    //         'paymentInstrument'     => ['type' => 'PAY_PAGE'],
    //     ];

    //     $encode = base64_encode(json_encode($paymentData));
    //     $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
    //     $string = $encode . '/pg/v1/pay' . $saltKey;
    //     $sha256 = hash('sha256', $string);
    //     $saltIndex = 1;
    //     $finalXHeader = $sha256 . '###' . $saltIndex;

    //     $maxRetries = 5;
    //     $retryDelay = 1; // Start with a 1-second delay
    //     $attempts = 0;

    //     while ($attempts < $maxRetries) {
    //         try {
    //             $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay')
    //                 ->withHeader('Content-Type: application/json')
    //                 ->withHeader('X-VERIFY:' . $finalXHeader)
    //                 ->withData(json_encode(['request' => $encode]))
    //                 ->post();

    //             $userId = $this->user->where('email', $data['email'])->first();
    //             $data['orderId'] = $newOrderId;
    //             $data['userId'] = $userId->id;
    //             Log::info('User ID:', ['userId' => $data['userId']]);

    //             $rData = json_decode($response);
    //             Log::info('Payment API Response:', ['response' => $rData]);

    //             if ($rData->success) {
    //                 if (isset($rData->data->instrumentResponse->redirectInfo->url)) {
    //                     // Insert the order only if the payment is successful
    //                     $this->payment->newOrder($data);
    //                     return $rData->data->instrumentResponse->redirectInfo->url;
    //                 } else {
    //                     Log::error('Unexpected response structure', ['response' => $rData]);
    //                     return ''; // Handle accordingly, maybe return a default URL or throw an exception
    //                 }
    //             } else {
    //                 Log::error('Payment API Error', [
    //                     'code' => $rData->code,
    //                     'message' => $rData->message
    //                 ]);

    //                 if ($rData->code === 'TOO_MANY_REQUESTS') {
    //                     $attempts++;
    //                     sleep($retryDelay);
    //                     $retryDelay *= 2; // Exponential backoff
    //                     // Generate a new orderId for the next attempt
    //                     $lastOrderId = $this->payment->latest('id')->value('id');
    //                     $newOrderId = 'W1' . ($lastOrderId + 1);
    //                     $paymentData['merchantTransactionId'] = $newOrderId;
    //                     $encode = base64_encode(json_encode($paymentData));
    //                     $string = $encode . '/pg/v1/pay' . $saltKey;
    //                     $sha256 = hash('sha256', $string);
    //                     $finalXHeader = $sha256 . '###' . $saltIndex;
    //                     continue; // Retry the request
    //                 }

    //                 return ''; // Handle other errors as needed
    //             }
    //         } catch (\Exception $e) {
    //             Log::error('Payment initialization failed', ['error' => $e->getMessage()]);
    //             return ''; // Handle as needed
    //         }
    //     }

    //     Log::error('Max retries reached for payment initialization');
    //     return ''; // Handle max retries reached case as needed
    // }





    // public function initialisePayment(array $data)
    // {
    //     $lastOrderId = $this->order->latest('id')->value('id');
    //     $newOrderId = ($lastOrderId == null) ? 'WITS1' :  'W1' . ($lastOrderId + 1);
    //     $amount = $data['totalprice'] * 100;

    //     $paymentData =  [
    //         "merchantId"            => "M1B1TL0NMBBI",
    //         "merchantTransactionId" => $newOrderId,
    //         "merchantUserId"        => "MUID123",
    //         "amount"                => $amount,
    //         "redirectUrl"           => route('response'),
    //         "redirectMode"          => "POST",
    //         "callbackUrl"           => route('response'),
    //         "mobileNumber"          => $data['mobile'],
    //         "paymentInstrument"     => [
    //             "type" => "PAY_PAGE"
    //         ],
    //     ];

    //     $encode = base64_encode(json_encode($paymentData));
    //     $saltKey = "07f5ccf3-1af4-458f-ba75-edc8554bb01b";
    //     $saltIndex = 1;
    //     $finalXHeader = hash('sha256', $encode . '/pg/v1/pay' . $saltKey) . '###' . $saltIndex;

    //     $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/pay')
    //         ->withHeader('Content-Type: application/json')
    //         ->withHeader('X-VERIFY:' . $finalXHeader)
    //         ->withData(json_encode(['request' => $encode]))
    //         ->post();

    //     // crweating order id
    //     $userId = $this->user->createGuestUser($data);
    //     $data['orderId'] = $newOrderId;
    //     $data['userId'] = $userId;
    //     $this->order->newOrder($data);

    //     // fetching the url form the responce
    //     $rData = json_decode($response);

    //     if (!$rData->success) {
    //         Log::error('[PhonePayPaymentService][initialisePayment] Payment failed ', [
    //             'data'     => $data,
    //             'response' => $rData
    //         ]);
    //         return false;
    //     }

    //     $url = $rData->data->instrumentResponse->redirectInfo->url;
    //     return $url;
    // }
}
