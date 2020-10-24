<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $nonce = time();
        $access_key = "560e19cf972c8d6e";
        $secret_key = "965039792952d7a310234e1de59aad26";
        $sig = hash_hmac('SHA256', $nonce . $access_key, $secret_key);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://stage.stagebcoin.com/api/v2/peatio/account/latest/deposit_address");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(
            [
                "currency" => "BIZZ",
                "amount" => 4.8,
                "callback_url" => "callback_url",
                "web_hook_url" => "web_hook_url",
                "remarks" => 'placed_order_id',
                "user_id" => 'user_id'
            ]
        ));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'cache-control: no-cache',
            'content-type: multipart/form-data',
            'X-Auth-Apikey:' . $access_key,
            'X-Auth-Nonce:' . $nonce,
            'X-Auth-Signature:' . $sig,
        ]);

        $result = curl_exec($ch);

        curl_close($ch);
        $data = "BIZZ:".json_decode($result)->address."?amount=4.8";
        $qrCode = new \Endroid\QrCode\QrCode($data);
        dd($qrCode);
        $qrCode->setWriterByName('png');
        $qrCode->setEncoding('UTF-8');
        $dataUri = $qrCode->writeDataUri();
        return response()->json(json_decode($result), 200);
    }
}
