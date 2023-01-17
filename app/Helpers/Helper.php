<?php

namespace App\Helpers;

use Carbon\Carbon;


class Helper{


    public function getCurrentdate(){
        return $now = now();
    }
    //diffrence of days beetween check_in & check_out   
    public function getDays($check_in,$check_out){
        $check_in=strtotime($check_in);//this function convert day format to the number of seconds since January 1 1970 00:00:00 GMT)
        $check_out=strtotime($check_out);
        $dif=$check_out-$check_in;
        $dif=$dif/86400;
        $dif=round($dif); //convert float to nearest integer 
        return $dif;
    }
    public static function dateDayFormat($date)
    {
        return Carbon::parse($date)->isoFormat('dddd, D MMM YYYY');
    }
    
   








}
