<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
   public function Reminders(){
       try
       {
           $appointments   = Appointments::where('due_date',Carbon::tomorrow()->format('Y-m-d'))
                             -> where('appointment_type',1)
                             ->where('status',0)
                             ->get();


            return $appointments;


       } catch(\Exception $e){

           return  response()->json(['message'=> $e->getMessage()]);
       }
   }

   public function Missed(){
       try
       {
           $appointments   = Appointments::whereRaw('datediff(CURDATE(),due_date) > 0 AND datediff(CURDATE(),due_date) < 5')
                             -> where('appointment_type',1)
                             ->where('status',0)
                             ->get();


            return $appointments;


       } catch(\Exception $e){
           
           return  response()->json(['message'=> $e->getMessage()]);
       }
   }
      public function missedToday(){
       try
       {
           $today          = Carbon::now()->format('Y-m-d');
           $appointments   = Appointments::where('due_date',$today)
                             -> where('appointment_type',1)
                             ->where('status',0)
                             ->get(
                                 [
                                     'mobile_phone_number',
                                     'first_name',
                                     'institutionid',
                                     'due_date',
                                     'id'
                                 ]
                             );


            return $appointments;


       } catch(\Exception $e){
           
           return  response()->json(['message'=> $e->getMessage()]);
       }
   }
   public function Update($appointmentID){
       try
       {
           $id     = Appointments::where('id', $appointmentID);
           $update = $id->update(['reminded'=>"Yes"]);
           return  $update;

        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage]);
        }
   }
}
