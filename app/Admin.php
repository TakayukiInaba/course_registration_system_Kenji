<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //
    protected $guarded = array('id');

    //バリデーションルールとメッセージ
    public static $rules = [
        'id'=>'required',
        'username' => 'required|between:1,20',
        'password' => 'required|between:1,100',
       
    ];

    public static $messages = [
        'id.required' => 'エラーが発生しました。少し時間を置いて再度修正処理を行ってください。',
        'username.required' => '「ユーザーネーム」を入力してください。',
        'username.between' => '「ユーザーネーム」は1～20字の間で設定してください。',
        'password.required' => '「パスワード」を入力してください。',
        'password.between' => '「パスワード」は1～20字の間で設定してください。',
       
    ];
}
