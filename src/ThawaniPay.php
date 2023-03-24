<?php

namespace Pwk\ThawaniPay;

class ThawaniPay
{

    public  static  function CreateSession()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://uatcheckout.thawani.om/api/v1/checkout/session",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"client_reference_id\": \"123412\",\n  \"mode\": \"payment\",\n  \"products\": [\n    {\n      \"name\": \"product 1\",\n      \"quantity\": 1,\n      \"unit_amount\": 100\n    }\n  ],\n  \"success_url\": \"https://company.com/success\",\n  \"cancel_url\": \"https://company.com/cancel\",\n  \"metadata\": {\n    \"Customer name\": \"somename\",\n    \"order id\": 0\n  }\n}",
            CURLOPT_HTTPHEADER => [
                "Content-Type: ",
                "thawani-api-key: rRQ26GcsZzoEhbrP2HZvLYDbn9C9et"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

}
