<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','name', 'email','subject_id','password'
    ];

     /**
     * バリデーション用ルール設定
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:10',
        'first_name' => 'required|max:10',
        'email' => 'required|email|max:80|unique:students,email',
        'subject_id' => 'required|digits:1',
        'password' => 'required|confirmed|between:6,30',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //subjectモデルからuserの教科を特定するためのメソッド
    

}
