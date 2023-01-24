<?php

namespace Skima\Giglogistics\Traits;


trait Gig
{
   public $gigBaseUrl;
    public $gigPost;

    public function login()
    {
        $this->gigPost = json_encode([
            'username' => config("constants.gig.username"),
            'Password' => config("constants.gig.password"),
            'SessionObj' => ""
        ]);

        $data = $this->GigLoginCurl();

        return $data->Object->access_token;

    }

    public function getStations()
    {

       $this->gigBaseUrl = config("constants.gig.baseurl")."localStations";

        $data = $this->GigCurl();

        return $data;

    }



    public function GigLoginCurl()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://giglthirdpartyapitestenv.azurewebsites.net/api/thirdparty/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $this->gigPost,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
//            $data = [
//                'message' => "cURL Error #: {$err}"
//            ];

            //return response()->json([$data], 503);
            return json_decode("cURL Error #:" . $err);
        } else {
            return json_decode($response);
        }
    }


      public function GigCurl()
    {
        $token = $this->login();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->gigBaseUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer".$token,
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
//            $data = [
//                'message' => "cURL Error #: {$err}"
//            ];

            //return response()->json([$data], 503);
            return json_decode("cURL Error #:" . $err);
        } else {
            return json_decode($response);
        }
    }
}
