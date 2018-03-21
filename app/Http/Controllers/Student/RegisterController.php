<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class RegisterController extends Controller
{
    //

    /**
    *検証済みデータ格納用セッションキー
    */
    protected $sessionKey ='RegisterData';

    public function index()
    {
        $student = new Student();
        if ($data = \Session::get($this->sessionKey))
        {
            $student->fill($data);
        }

        return view('student.register.index')->with(compact('student'));
    }

    /**
    *
    */
    public function postIndex(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:10',
            'first_name' => 'required|max:10',
            'email' => 'required|max:255|email|unique:students,email',
            'student_id' => 'required|max:255|unique:students,student_id',
            'password' => 'required|confirmed|password_between:4,30',
        ]);
        
    
        \Session::put($this->sessionKey,$data);

        return redirect()->route('student.confirm');
    }

     /**
    *
    */
    public function confirm()
    {
        if (! $data = \Session::get($this->sessionKey))
        {
            return redirect()->route('student.index');
        }

        return view('student.confirm')->with(compact('data'));
    }

    public function postConfirm(student $student)
    {
        if (! $data = \Session::get($this->sessionKey))
        {
            return redirect()->route('student.register.index');
        }

        $data['password'] = bcrypt($data['password']);
        $student->fill($data)->save();
        auth('student')->login($student);
        \Session::forget($this->sessionKey);

        return redirect()->route('student.register.thanks');
    }

    public function thanks()
    {
        return view('student.register.thanks');
    }
}
