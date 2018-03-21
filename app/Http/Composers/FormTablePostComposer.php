<?php

namespace App\http\Composers;

use Illuminate\View\View;
use illuminate\Support\Facades\Auth;
use App\Term;
use App\Time;
use App\Course;


class FormTablePostComposer
{
    public function compose(View $view)
    {
        $terms = Term::all();
        $times = Time::all();

        foreach ($terms as $term)
        {
            foreach ($times as $time)
            { 
                $items = array($term->id.$time->id => Course::tableTerm($term->id)->tableTime($time->id)->get());
            }
        }
        
        $view->with(['terms'=>$terms,
                     'times'=>$times,
                     'items'=>$items,
                    ]); 
    }
}