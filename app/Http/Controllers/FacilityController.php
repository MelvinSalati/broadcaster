<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function facility($district_id){
        $facility  =  Facility::where("district_id", $district_id)->get();
        return response()->json(['facilities' => $facility]);
    } 

    public static function name($facility){

        $collection = Facility::where("hmis_code", $facility);
        $facility   = $collection->get(["facility_name as name"]);
        $facility_name = json_decode($facility,true);
        return $facility_name[0]['name'];

    } 
     public static function sender($facility){

        $collection = Facility::where("hmis_code", $facility);
        $facility   = $collection->get(["sender_name as name"]);
        $facility_name = json_decode($facility,true);
        return $facility_name[0]['name'];
    }

    public static function phone($hmis){

        $collection = Facility::where('hmis_code',$hmis);
        $facility   = $collection->get(["primary_number as call"]);
        $facility_name = json_decode($facility,true);
        return $facility_name[0]['call'];
    }

}
