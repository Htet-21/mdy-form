<?php

namespace App\Http\Controllers;

use App\Donation;

use App\Method;

use App\Provider;

use App\Callback;

use App\DonationType;

use App\DonationTypeMm;

use App\Http\Requests\DonationRequest;

use Illuminate\Support\Facades\Http;


class DonationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function index()
    {
        $donation_type_lists = DonationType::all();
        $payment_method_lists = Method::all();
        $payment_provider_lists = Provider::all();
        return view('donation.index', compact('donation_type_lists', 'payment_method_lists', 'payment_provider_lists'));
    }


    public function index_mm()
    {
        $donation_type_lists = DonationTypeMm::all();
        $payment_method_lists = Method::all();
        $payment_provider_lists = Provider::all();
        return view('donation-mm.index', compact('donation_type_lists', 'payment_method_lists', 'payment_provider_lists'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function add(DonationRequest $request)
    {
        $input = $request->all();

        $lastDonation = Donation::orderBy('id', 'desc')->first();

        if ($lastDonation == null) {
            $input['donate_id'] = 'sannkyi-01';
        } else {
            $input['donate_id'] = 'sannkyi-0' . ($lastDonation->id + 1);
        }

        $input['name'] = $request->input('fname').' '.$request->input('lname');

        Donation::create($input);

        $curl = curl_init();

        $data = array(
            "projectName" => "Sannkyi Production",
            "apiKey" => "fpp5r9n.YfyNQVwXh7n3hwlCi8bRezaoy8c",
            "merchantName" => "mtkproduction",
            "date" => date("Ymd"),
            "time" => date("h:i:s"),
            "timezone" => "Asia/Yangon",
            "clientVersionNo" => "1",
            "channel" => "WEB"
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.dinger.asia/api/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "authorization: Basic xxx",
                "cache-control: no-cache",
                "content-type: multipart/form-data",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $data_token = json_decode($response);

        $name = $request->input('fname').' '.$request->input('lname');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $method = $request->input('payment_method');
        $total = $request->input('amount');
        $payment = $request->input('payment');

        if ($lastDonation == null) {
            $donationID = 'sannkyi-01';
        } else {
            $donationID = 'sannkyi-0' . ($lastDonation->id + 1);
        }

        $items_data = array(
            "name" => "Dinger Payment",
            "amount" => "$total",
            "quantity" => "1"
        );

        if ($payment == "Visa") {
            $data_pay = json_encode(array(
                "providerName" => $payment,
                "methodName" => $method,
                "totalAmount" => "$total",
                "items" => json_encode(array($items_data)),
                "orderId" => $donationID,
                "customerName" => $name,
                "email" => $email,
                "billToForeName" => $fname,
                "billToSurName" => $lname,
                "billAddress" => "No.70, Thukha street, Kyauk Myaung Tsp",
                "billCity" => "Yangon",
                "customerPhone" => $phone
            ));
        } elseif ($payment == "Master") {
            $data_pay = json_encode(array(
                "providerName" => $payment,
                "methodName" => $method,
                "totalAmount" => "$total",
                "items" => json_encode(array($items_data)),
                "orderId" => $donationID,
                "customerName" => $name,
                "email" => $email,
                "billToForeName" => $fname,
                "billToSurName" => $lname,
                "billAddress" => "No.70, Thukha street, Kyauk Myaung Tsp",
                "billCity" => "Yangon",
                "customerPhone" => $phone
            ));
        } elseif ($payment == "JCB") {
            $data_pay = json_encode(array(
                "providerName" => $payment,
                "methodName" => $method,
                "totalAmount" => "$total",
                "items" => json_encode(array($items_data)),
                "orderId" => $donationID,
                "customerName" => $name,
                "email" => $email,
                "billToForeName" => $fname,
                "billToSurName" => $lname,
                "billAddress" => "No.70, Thukha street, Kyauk Myaung Tsp",
                "billCity" => "Yangon",
                "customerPhone" => $phone
            ));
        } elseif ($payment != "Visa" && $payment != "Master" && $payment != "JCB") {
            $data_pay = json_encode(array(
                "providerName" => $payment,
                "methodName" => $method,
                "totalAmount" => "$total",
                "items" => json_encode(array($items_data)),
                "orderId" => $donationID,
                "customerName" => $name,
                "customerPhone" => $phone
            ));
        }

        $publicKey = '-----BEGIN PUBLIC KEY-----MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCH5rTdCV2dxn6qa+tuD/BbqwScJilFxZoV5rksrcH49J3hc/yXMucZJa/bh78G0zOm84jAobA3XAk001Aoa3NzciIr3hQL99Tk8xyTYPhVUoZUR8M/pA+g43BQdm1roEEeGY5mYkgm2ErJHb6nEoQVkL5CJJCfx94/pW/OqJgH9wIDAQAB-----END PUBLIC KEY-----';

        $rsa = new \phpseclib\Crypt\RSA();

        extract($rsa->createKey(1024));
        $rsa->loadKey($publicKey); // public key
        $rsa->setEncryptionMode(2);

        $ciphertext = $rsa->encrypt($data_pay);

        $value = base64_encode($ciphertext);

        $payToken = $data_token->response->paymentToken;

        $response_pay = Http::withToken($payToken)->asForm()->post("https://api.dinger.asia/api/pay", [
            'payload' => $value,
        ]);

        $response_payment = json_decode($response_pay);

        if ($response_payment->code == "000") {

            if ($payment == "AYA Pay" & $method == "QR") {

                $pay_qr = $response_payment->response->qrCode;

                $scan_qr = "Scan QR Code with your " . $payment . " App";

                return redirect("donation/qr/$pay_qr/$scan_qr/$donationID");
            }

            if ($payment == "KBZ Pay" & $method == "QR") {

                $pay_qr = $response_payment->response->qrCode;

                $scan_qr = "Scan QR Code with your " . $payment . " App";

                return redirect("donation/qr/$pay_qr/$scan_qr/$donationID");
            }


            if ($method == "PIN" & $payment == "AYA Pay") {

                $scan_pin = "ငွေပေးချေမှု ပြီးမြောက်ရန် $payment app တွင် အတည်ပြုပါ။";

                return redirect("donation/pin/$scan_pin/$donationID");
            }

            if ($method == "PIN" & $payment == "Sai Sai Pay") {

                $scan_pin = "ငွေပေးချေမှု ပြီးမြောက်ရန် $payment app တွင် အတည်ပြုပါ။";

                return redirect("donation/pin/$scan_pin/$donationID");
            }

            if ($method == "PIN" & $payment == "Onepay") {

                $scan_pin = "ငွေပေးချေမှု ပြီးမြောက်ရန် $payment app တွင် အတည်ပြုပါ။";

                return redirect("donation/pin/$scan_pin/$donationID");
            }

            if ($method == "PIN" & $payment == "MPitesan") {

                $scan_pin = "ငွေပေးချေမှု ပြီးမြောက်ရန် $payment app တွင် အတည်ပြုပါ။";

                return redirect("donation/pin/$scan_pin/$donationID");
            }

            if ($method == "PIN" & $payment == "Mytel") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "PIN" & $payment == "WAVE PAY") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "PIN" & $payment == "Citizens") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "PWA" & $payment == "KBZ Pay") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "PWA" & $payment == "KBZ Direct Pay") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "OTP" & $payment == "MPU") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "OTP" & $payment == "Visa") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "OTP" & $payment == "Master") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "OTP" & $payment == "JCB") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "OTP" & $payment == "MAB Bank") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

            if ($method == "OTP" & $payment == "New Payment") {

                $formToken = $response_payment->response->formToken;

                $transactionNum = $response_payment->response->transactionNum;

                $merchOrderId = $response_payment->response->merchOrderId;

                return redirect("/donation/confirm-data/$transactionNum/$formToken/$merchOrderId/$donationID");
            }

        } else {
            return back()->with('error', $response_payment->message);
        }

    }

    public function success($paymentResult, $checkSum)
    {
        return view('donation.success', compact('paymentResult', 'checkSum'));
    }

    public function pin($scan_pin, $donationID)
    {
        $donationData = Donation::where('donate_id', $donationID)->first();

        return view('donation.pin', compact('donationData', 'scan_pin', 'donationID'));
    }

    public function qr($pay_qr, $scan_qr, $donationID)
    {
        $donationData = Donation::where('donate_id', $donationID)->first();

        return view('donation.qr', compact('donationData', 'pay_qr', 'scan_qr', 'donationID'));
    }

    public function getData($donationID)
    {
        // get records from database

        $callbackData = Callback::where('merchantOrderId', $donationID)->first();

        return view('getData', compact('callbackData'));
    }

    public function pin_getData($donationID)
    {
        // get records from database

        $callbackData = Callback::where('merchantOrderId', $donationID)->first();

        return view('pin-getData', compact('callbackData'));
    }

    public function confirmData($transactionNum, $formToken, $merchOrderId, $donationID)
    {
        // get records from database

        $donationData = Donation::where('donate_id', $donationID)->first();

        return view('donation.confirm-data', compact('donationData', 'transactionNum', 'formToken', 'merchOrderId', 'donationID'));
    }
}
