<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Subject;
use App\Position;

class RegisterController extends Controller
{
    //

    /**
    *検証済みデータ格納用セッションキー
    */
    protected $sessionKey ='RegisterData';

    public function index(){
        $teacher = new Teacher();
        $subjects = subject::all(); 
        $positions = position::all();
        if ($data = \Session::get($this->sessionKey))
        {
            $teacher->fill($data);
        }
        return view('teacher.register.index')->with(compact('teacher','subjects','positions'));
    }

    public function postIndex(Request $request){
        $data = $request->validate(Teacher::$rules,Teacher::$messages);
        \Session::put($this->sessionKey,$data);
        return redirect()->route('teacher.register.confirm');
    }

    public function confirm(){
        if (! $data = \Session::get($this->sessionKey)){
            return redirect()->route('teacher.register.index');
        }
        $sbjVal = subject::find($data['subject_id'])->value;
        $posiVal = position::find($data['position_id'])->value;
        return view('teacher.register.confirm')->with(compact('data','sbjVal','posiVal'));
    }

    public function postConfirm(teacher $teacher){
        if (! $data = \Session::get($this->sessionKey)){
            return redirect()->route('teacher.register.index');
        }
        $data['password'] = bcrypt($data['password']);
        $teacher->fill($data)->save();
        auth('teacher')->login($teacher);
        \Session::forget($this->sessionKey);
        return redirect()->route('teacher.register.thanks');
    }

    public function thanks()
    {
        return view('teacher.register.thanks');
    }
}
