<?php

namespace App\CustomStuff\CustomClass;

class GetNumberReg
{
    private $tmp_caller_id ;
    private $number;

    function __construct($number = null)
    {
        $this->number = $number;
        $this->callUsers();
    }
    private function callUsers()
    {
        if ($this->number != 0)
        {
            $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
            $url = "https://pbx-guru.web.pbxmaker.ru/index.php/restapi/auth";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_USERAGENT, $agent);
            $headers = array(
                "Content-Type: application/x-www-form-urlencoded",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $data = "grant_type=password&scope=users&client_id=1kvik&client_secret=bqnqxnhwdb4";

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

            $out = json_decode(curl_exec($curl), JSON_OBJECT_AS_ARRAY);
            curl_close($curl);
            ////////////////////////////
            $url = "https://pbx-guru.web.pbxmaker.ru/index.php/restapi/number/call-auth";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_USERAGENT, $agent);
            $headers = array(
                "Authorization: Bearer " . $out["access_token"],
                "Content-Type: application/x-www-form-urlencoded",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $dat = ["caller_id" => $this->number];
            $data = http_build_query($dat);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp = json_decode(curl_exec($curl), JSON_OBJECT_AS_ARRAY);
            curl_close($curl);


            //////////////////////////////////////
            $url = "https://pbx-guru.web.pbxmaker.ru/index.php/restapi/number/approve";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_USERAGENT, $agent);
            $headers = array(
                "Authorization: Bearer " . $out["access_token"],
                "Content-Type: application/x-www-form-urlencoded",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $dat = ["action" => "call-auth",
                "caller_id" => $resp["caller_id"],
                "tmp_caller_id" => $resp["tmp_caller_id"]];
            $data = http_build_query($dat);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp2 = curl_exec($curl);
            curl_close($curl);
            var_dump($resp2);
            $this->tmp_caller_id = $resp["tmp_caller_id"];
        }
    }
    public function getNumberUsers(){
        if (substr($this->tmp_caller_id, -4)){
            dump('Технологическая подсказка! Код звонка - '.substr($this->tmp_caller_id, -4)); // Вывод посказки
            return substr($this->tmp_caller_id, -4);
        }
    }
}
