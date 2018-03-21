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


class FormComposer
{
    public function compose(View $view)
    {
        $terms = Term::all();
        $times = Time::all();
        $grades = Grade::all();
        $levels = Level::all();
        $user = Auth::user();
        $optSbj = [$user->subject_id => $user->getSbjVal()]; 
        //"getSbjVal"->subjectモデルからuserの教科を特定するためのメソッド
        $subject = Subject::find($user->subject_id);
      

        $optTerms = array();
        $optTimes = array();
        $optGrades = array();
        $optLevels = array();
        $optTeachers  = array();
        

        foreach ($terms as $item){
            $optTerms += array($item->id => $item->value);
        }
        foreach ($times as $item){
            $optTimes += array($item->id => $item->value);
        }
        foreach ($grades as $item){
            $optGrades += array($item->id => $item->value);
        }
        foreach ($levels as $item){
            $optLevels += array($item->id => $item->value);
        }
        foreach ($subject->teachers as $obj){
            $optTeachers += array($obj->id => $obj->value);
        }
        
        $view->with(['optTerms'=>$optTerms,
                     'optTimes'=>$optTimes,
                     'optGrades'=>$optGrades,
                     'optLevels'=>$optLevels,
                     'optSbj'=>$optSbj,
                     'optTeachers'=>$optTeachers,]); 
    }
}