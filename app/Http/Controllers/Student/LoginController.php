<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;//追加

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function redirectTo()
    {
        return route('student.top');
    }

    public function showLoginForm()
    {
        return view('student.login');
    }

    protected function validateLogin(Request $request)
    {
        $messages = [
            $this->username().'.required' =>'学籍番号を入力してください。',
            $this->username().'.digits_between:5,6' => '学籍番号を正確に入力してください。', 
            'password' =>'required|string',
        ];

        $this->validate($request,[
            $this->username() => 'required|string',
            'password' => 'required|string',
        ],$messages);
    }

    /**
    *ログインIDの英語名
    */
    public function username()
    {
        return 'username';
    }

    /**
    *ログアウト処理
    */
    public function logout(Request $request)
    {
        $partialLogin = auth('teacher')->guest() || auth('student')->guest();
            $this->guard()->logout();

            //どちらか片方のみでログインしている時のみ、invalidateする
            if ($partialLogin){
                $request->session()->invalidate();
            }

        return redirect()->route('student.login');
    }

    /**
    *使用する認証を返す
    */
    public function guard()
    {
        return auth('student');
    }

}
