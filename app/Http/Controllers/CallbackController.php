<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Callback;
use App\Checkout;

use Illuminate\Support\Facades\Http;


class CallbackController extends Controller
{

    public function store(Request $request)
    {

        $paymentResult = $request->paymentResult;
        $checkSum = $request->checksum;
        $secrectKey =  "e9ec02861c8f744946894af0c7196a04";
        $decrypted = openssl_decrypt($paymentResult, "AES-256-ECB", $secrectKey);

        if (hash("sha256", $decrypted) !== $checkSum) {
            response()->json([
                'message' => 'Incorrect signature',
            ], 400);
        } elseif (hash("sha256", $decrypted) == $checkSum) {

            $decryptedValues = json_decode($decrypted, true);

            $transactionStatus = $decryptedValues["transactionStatus"];

            $merchantOrderId = $decryptedValues["merchantOrderId"];

            $totalAmount = $decryptedValues["totalAmount"];

            $methodName = $decryptedValues["methodName"];

            $providerName = $decryptedValues["providerName"];

            $transactionId = $decryptedValues["transactionId"];

            $customerName = $decryptedValues["customerName"];

            $CreateCallbackData = Callback::create([
                'transactionStatus' => $transactionStatus,
                'merchantOrderId' => $merchantOrderId,
                'totalAmount' => $totalAmount,
                'methodName' => $methodName,
                'providerName' => $providerName,
                'transactionId' => $transactionId,
                'customerName' => $customerName,
            ]);

            if ($transactionStatus == "SUCCESS") {
                $status_update = Checkout::where('order_id', $merchantOrderId)->update(['transaction_status' => $transactionStatus]);
            }

            if ($CreateCallbackData) {
                return response()->json([
                    'data' => [
                        'type' => 'callbackData',
                        'message' => 'Success Callback Data',
                        'id' => $CreateCallbackData->id,
                        'attributes' => $CreateCallbackData
                    ]
                ], 201);
            } else {
                return response()->json([
                    'type' => 'callbackData',
                    'message' => 'Fail to send callback data'
                ], 400);
            }
        }

    }

    public function getActivityByMerchantId($merchantOrderId)
    {
        $activity = Callback::with('merchantOrderId')->find($merchantOrderId);

        return
            view('dashboard.success', compact('activity'));
    }
}
