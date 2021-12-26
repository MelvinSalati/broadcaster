<?php

namespace App\Http\Controllers;

use App\Models\Sender;
use App\Models\Zamtel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SenderController extends Controller
{
    public $apiKey;

    public function __construct(){

        return $this->apiKey = "56880adeae8603a9ae4b52d75d7c2b1f";
    }

    public function Send($message,$phone_number,$sender){

       try 
       {
            $key    = "56880adeae8603a9ae4b52d75d7c2b1f";
            $sendMessage = Http::get("https://bulksms.zamtel.co.zm/api/sms/send/batch?message=$message&key=$key&contacts=$phone_number&senderId=$sender");

            if($sendMessage){
                return true;
            } 

       }
       catch(\Exception $e){

           return response()->json(['message'=> $e->getMessage()]);

       }

    }
}
