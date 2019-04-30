<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddRequest;
use illuminate\Support\Facades\Auth;
use App\Term;
use App\Time;
use App\Subject;
use App\Grade;
use App\Level;
use App\Teacher;
use App\User;
use App\Course;
use App\Entry;
use Validator;

class IndexController extends Controller
{
    //教員用トップ画面表示
    public function index(Request $request){
        $teacher = Auth::user();
        $items = Course::with(['term', 'time','subject','level','grade','teacher'])->where('subject_id',$teacher->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->get();
        return view('teacher.index',['items'=> $items,'teacherValue'=> $teacher->value]);  
    }

   
}
