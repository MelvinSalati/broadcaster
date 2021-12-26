<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnglishController extends Controller
{
    public function missedAppointment($firstname,$due_date,$time,$facility_phone){

        try
        {

            $message  =  "Hi, $firstname, You have missed an important appointment $due_date at $time, We look foward to assisting you. Call on $facility_phone";

            return $message;

        } 
        catch(\Exception $e){

            return response()->json(['message'=> $e->getMessage()]);

        }

    } 
      public function instantAppointment($firstname,$due_date,$time,$facility_phone){

        try
        {

            $message  =  "Hi, $firstname, You have missed an important appointment today $due_date at $time, We are waiting for you. Call on $facility_phone";

            return $message;

        } 
        catch(\Exception $e){

            return response()->json(['message'=> $e->getMessage()]);

        }

    }

    public function remindAppointment($firstname,$due_date,$time,$facility_phone){

        try
        {

            $message  =  "Hi, $firstname, You have an important appointment today $due_date at $time, We look foward to assisting you. Call on $facility_phone";

            return $message;

        } 
        catch(\Exception $e){

            return response()->json(['message'=> $e->getMessage()]);

        }

    }

      public function covidMessage($firstname,$due_date,$time,$facility_phone){

        try
        {

            $message  =  "Hi $firstname, please note that Covid19 vaccine is available. Enquire about it in person or call $facility_phone We look foward to helping you.";

            return $message;

        } 
        catch(\Exception $e){

            return response()->json(['message'=> $e->getMessage()]);

        }

    }
}
