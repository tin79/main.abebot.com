<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parser;

class MainController extends Controller
{
    //
    /**
     * @param Request $request
     */
    public function receive(Request $request)
    {
        $data = $request->all();
        $p = new Parser();
        // $this->my_var_dump($data);
        // get the user’s id
        if (isset($data["entry"][0]["messaging"][0]['message']['text'])) {
            $id = $data["entry"][0]["messaging"][0]["sender"]["id"];
            $r = $p->getName($data["entry"][0]["messaging"][0]['message']['text']);
            if (isset($r['name']))
                $this->sendTextMessage($this->responseText($id,"Hello ".$r['name']));
            else
                $this->sendTextMessage($this->responseText($id,"Hello "));
        } else{
            var_dump($data);
        }

    }

    private function responseText($recipientId,$message)
    {
        $messageData = [
            "recipient" => [
                "id" => $recipientId
            ],
            "message" => [
                "text" => $message
            ]
        ];

        return $messageData;
    }

    private function sendTextMessage($messageData)
    {


        $ch = curl_init('https://graph.facebook.com/v2.10/me/messages?access_token=' . env("PAGE_ACCESS_TOKEN"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
        curl_exec($ch);

    }

    public function my_var_dump($d)
    {
        $handle = fopen(env("APP_ROOT").'public/var_dump.html','a+');
        fwrite($handle,json_encode($d)."\n");
        fclose($handle);
    }

}
