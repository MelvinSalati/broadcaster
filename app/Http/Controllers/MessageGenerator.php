<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\EnglishController;
use Illuminate\Http\Request;

class MessageGenerator extends Controller
{
    public function CreateMessage($languageID,$messagetype,$firstname,$due_date,$time,$faciliy_phone){
        try
        {
            if($languageID==1){

                if($messagetype==1){
                    return EnglishController::missedAppointment($firstname,$due_date,$time,$faciliy_phone);
                } else if($messagetype==2){
                    return EnglishController::remindAppointment($firstname,$due_date,$time,$faciliy_phone);
                } else if($messagetype==3){
                    return EnglishController::instantAppointment($firstname,$due_date,$time,$faciliy_phone);
                } else if($messagetype==4){
                    return EnglishController::covidMessage($firstname,$due_date,$time,$faciliy_phone);
                }
                
            } else {

                //default language 
                  if($messagetype==1){
                    return EnglishController::missedAppointment($firstname,$due_date,$time,$faciliy_phone);
                } else if($messagetype==2){
                    return EnglishController::remindAppointment($firstname,$due_date,$time,$faciliy_phone);
                } else if($messagetype==3){
                    return EnglishController::instantAppointment($firstname,$due_date,$time,$faciliy_phone);
                } else if($messagetype==4){
                    return EnglishController::covidMessage($firstname,$due_date,$time,$faciliy_phone);
                }

            }
        }
        catch(\Exception $e){
            return response()->json(['message'=> $e->getMessage()]);
        }
    } 

    public function isSent($messagetype,$phone){

        $message  = Message::where('message_type',$messagetype)->whereRaw('created_at=CURDATE()')
        ->where('phone',$phone)->count();

        if(!$message > 0){
            return false;
        } else {
            return true;
        }
    }
}
