<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Controllers\MessageGenerator;
use App\http\Controllers\AppointmentController as Appointment;
use App\http\Controllers\SenderController as Message;
use App\Models\Message as Sent;
use Carbon\Carbon;

class CovidVaccineReminderController extends Controller
{
    public function reminder(){

        $appointments       = Appointment::Reminders();


        foreach($appointments as $row){

            
            $hmis               = $row['institutionid'];
            $due_date           = Carbon::parse($row['due_date'])->format('d-M-Y');         
            $facility_phone     = FacilityController::phone($hmis);
            $sender             = FacilityController::sender($hmis);
            $phonenumber        = $row['mobile_phone_number'];
            $client             = $row['recipient_uuid'];
            $firstname          = $row['first_name'];
            $time               = $row['time_booked'];           
            $appointmentId      = $row['id'];
            $messagetype        = 4;
            $languageID         = 1;

            $isMessageSent      = MessageGenerator::isSent($messagetype,$phonenumber);
            

            if(!$isMessageSent){

                
                //create  message
                $message        = MessageGenerator::CreateMessage($languageID,$messagetype,$firstname,$due_date,$time,$facility_phone);
                
                //send message

                $send           = Message::Send($message,$phonenumber,$sender);

                if($send){

                   

                    //save  
                    $message  = Sent::create([

                        'message_type'  =>  $messagetype,
                        'phone'         =>  $phonenumber,
                        'hmis'          =>  $hmis
    
                    ]);
                
                    //update 

                    $isReminded = Appointment::Update($appointmentId);

                    
                    
                }
            }
        }
    }
}
