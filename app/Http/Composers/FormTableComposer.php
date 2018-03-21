<?php

namespace App\http\Composers;

use Illuminate\View\View;
use illuminate\Support\Facades\Auth;
use App\Term;
use App\Time;
use App\Subject;
use App\Grade;
use App\Level;
use App\Teacher;
use App\User;


class FormTableComposer
{
    public function compose(View $view)
    {
        
        $grades = Grade::all();
        $subjects = Subject::all();
      

        $optGrades = array('0' => '指定なし');
        $optSbjs = array('0' => '指定なし');
       

        foreach ($grades as $item){
            $optGrades += array($item->id => $item->value);
        }
       
        foreach ($subjects as $item){
            $optSbjs += array($item->id => $item->value);
        }
       
        
        $view->with(['optGrades'=>$optGrades,
                     'optSbjs'=>$optSbjs,]); 
    }
}