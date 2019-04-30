<?php

namespace App\http\Composers;

use Illuminate\View\View;
use App\Time;


class AdminTimeEditComposer
{
    public function compose(View $view)
    {
        $timeValue = array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
        );

        $startHours = array(
            8 => 8,
            9 => 9,
            10=>10,
            11=>11,
            12=>12,
            13=>13,
            14=>14,
            15=>15,
            16=>16,
            17=>17,
        );

        $lastHours = array(
            8 => 8,
            9 => 9,
            10=>10,
            11=>11,
            12=>12,
            13=>13,
            14=>14,
            15=>15,
            16=>16,
            17=>17,
        );

        $startMinutes = array(
            00 =>00,
            05 =>05,
            10 =>10,
            15 =>15,
            20 =>20,
            25 =>25,
            30 =>30,
            35 =>35,
            40 =>40,
            45 =>45,
            50 =>50,
            55 =>55,
        );

        $lastMinutes = array(
            00 =>00,
            05 =>05,
            10 =>10,
            15 =>15,
            20 =>20,
            25 =>25,
            30 =>30,
            35 =>35,
            40 =>40,
            45 =>45,
            50 =>50,
            55 =>55,
        );
        
        $view->with(['timeValue'=>$timeValue,
                     'startHours'=>$startHours,
                     'lastHours'=>$lastHours,
                     'startMinutes'=>$startMinutes,
                     'lastMinutes'=>$lastMinutes,
                    ]); 
    }
}