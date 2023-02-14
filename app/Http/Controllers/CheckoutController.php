<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Callback;
use App\CheckoutPlugin;
use App\Http\Requests\CheckoutPluginRequest;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
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
        return view('checkout.index');
    }

    public function index_mm()
    {
        return view('checkout.mm');
    }

    public function index_fix()
    {
        return view('checkout-fix.index');
    }

    public function index_fix_mm()
    {
        return view('checkout-fix.mm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function add(CheckoutRequest $request)
    {
        $input = $request->all();

        $lastDonation = Checkout::orderBy('id', 'desc')->first();

        if ($lastDonation == null) {
            $input['order_id'] = '001';
        } else {
            $input['order_id'] = '00' . ($lastDonation->id + 1);
        }

        $name = $request->input('customer_name');
        $product_name = $request->input('product_name');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $quantity = 1;
        $total = $amount * $quantity;

        $input['total_amount'] = $total;

        Checkout::create($input);

        if ($lastDonation == null) {
            $orderId = '001';
        } else {
            $orderId = '00' . ($lastDonation->id + 1);
        }

        $items_data = array(
            "name" => "$product_name",
            "amount" => "$amount",
            "quantity" => "$quantity"
        );

        $data_pay = json_encode(array(
            "clientId" => "afd1a802-34e7-3026-94be-241eaa10aba8",
            "publicKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCTd+Ag73/Sn3qddmWuO1ZmbqQl7JcJO5/S7yfT7xeoAHyE91Zpfen6gHvHotohK80vsS8fxD/8cGjCk5+FVJJDxRAyH1WUGbmEOdBLF/bfgPMXv0AgWaKmpkooGa1VbD+u0G3dBevv2JdpysJ715tqK+zf4XMv8s8z9Q/gmoB/8wIDAQAB",
            "items" => json_encode(array($items_data)),
            "customerName" => $name,
            "totalAmount" => "$total",
            "currency" => "$currency",
            "merchantOrderId" => "$orderId",
            "merchantKey" => "9qchi7f.-TeIrMkYG_RrZSeaEPX-2N-UrY8",
            "projectName" => "Paing's Courses",
            "merchantName" => "Aung Myo Paing"
        ));

        $publicKey = '-----BEGIN PUBLIC KEY-----MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCFD4IL1suUt/TsJu6zScnvsEdLPuACgBdjX82QQf8NQlFHu2v/84dztaJEyljv3TGPuEgUftpC9OEOuEG29z7z1uOw7c9T/luRhgRrkH7AwOj4U1+eK3T1R+8LVYATtPCkqAAiomkTU+aC5Y2vfMInZMgjX0DdKMctUur8tQtvkwIDAQAB-----END PUBLIC KEY-----';

        $rsa = new \phpseclib\Crypt\RSA();

        extract($rsa->createKey(1024));
        $rsa->loadKey($publicKey); // public key
        $rsa->setEncryptionMode(2);
        $ciphertext = $rsa->encrypt($data_pay);
        $value = base64_encode($ciphertext);

        $urlencode_value = urlencode($value);

        $encryptedHashValue = hash_hmac('sha256', $data_pay, 'c2fd9d9c680bb8cad88dc056bcf1ab65');
        $redirect_url = "https://form.dinger.asia?hashValue=$encryptedHashValue&payload=$urlencode_value";

        return redirect($redirect_url);

    }

    public function add_for_fix (CheckoutRequest $request)
    {
        $input = $request->all();

        $lastDonation = Checkout::orderBy('id', 'desc')->first();

        if ($lastDonation == null) {
            $input['order_id'] = '001';
        } else {
            $input['order_id'] = '00' . ($lastDonation->id + 1);
        }

        $name = $request->input('customer_name');
        $product_name = $request->input('product_name');
        $currency = $request->input('currency');
        $amount = 358200;
        $quantity = 1;
        $total = $amount * $quantity;

        $input['total_amount'] = $total;

        Checkout::create($input);

        if ($lastDonation == null) {
            $orderId = '001';
        } else {
            $orderId = '00' . ($lastDonation->id + 1);
        }

        $items_data = array(
            "name" => "$product_name",
            "amount" => "$amount",
            "quantity" => "$quantity"
        );

        $data_pay = json_encode(array(
            "clientId" => "afd1a802-34e7-3026-94be-241eaa10aba8",
            "publicKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCTd+Ag73/Sn3qddmWuO1ZmbqQl7JcJO5/S7yfT7xeoAHyE91Zpfen6gHvHotohK80vsS8fxD/8cGjCk5+FVJJDxRAyH1WUGbmEOdBLF/bfgPMXv0AgWaKmpkooGa1VbD+u0G3dBevv2JdpysJ715tqK+zf4XMv8s8z9Q/gmoB/8wIDAQAB",
            "items" => json_encode(array($items_data)),
            "customerName" => $name,
            "totalAmount" => "$total",
            "merchantOrderId" => "$orderId",
            "merchantKey" => "9qchi7f.-TeIrMkYG_RrZSeaEPX-2N-UrY8",
            "projectName" => "Paing's Courses",
            "merchantName" => "Aung Myo Paing"
        ));

        $publicKey = '-----BEGIN PUBLIC KEY-----MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCFD4IL1suUt/TsJu6zScnvsEdLPuACgBdjX82QQf8NQlFHu2v/84dztaJEyljv3TGPuEgUftpC9OEOuEG29z7z1uOw7c9T/luRhgRrkH7AwOj4U1+eK3T1R+8LVYATtPCkqAAiomkTU+aC5Y2vfMInZMgjX0DdKMctUur8tQtvkwIDAQAB-----END PUBLIC KEY-----';

        $rsa = new \phpseclib\Crypt\RSA();

        extract($rsa->createKey(1024));
        $rsa->loadKey($publicKey); // public key
        $rsa->setEncryptionMode(2);
        $ciphertext = $rsa->encrypt($data_pay);
        $value = base64_encode($ciphertext);

        $urlencode_value = urlencode($value);

        $encryptedHashValue = hash_hmac('sha256', $data_pay, 'c2fd9d9c680bb8cad88dc056bcf1ab65');
        $redirect_url = "https://form.dinger.asia?hashValue=$encryptedHashValue&payload=$urlencode_value";

        return redirect($redirect_url);

    }

    public function success($paymentResult, $checkSum)
    {
        return view('donation.success', compact('paymentResult', 'checkSum'));
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

        $donationData = Callback::where('donate_id', $donationID)->first();

        return view('donation.confirm-data', compact('donationData', 'transactionNum', 'formToken', 'merchOrderId', 'donationID'));
    }
}
