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
        $optSbj = [$user->subject_id => $user->getSubjectVal()]; 
        //"getSbjVal"->subjectモデルからuserの教科を特定するためのメソッド
        $teachers = Teacher::where('subject_id', $user->subject_id)->get();
      
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
        foreach ($teachers as $item){
            $optTeachers += array($item->id => $item->value.$item->name);
        }
        
        $view->with(['optTerms'=>$optTerms,
                     'optTimes'=>$optTimes,
                     'optGrades'=>$optGrades,
                     'optLevels'=>$optLevels,
                     'optSbj'=>$optSbj,
                     'optTeachers'=>$optTeachers,]); 
    }
}