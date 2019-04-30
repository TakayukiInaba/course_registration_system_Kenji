<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    
    //
    /**
     * create()やupdate()で入力を受け付ける ホワイトリスト
     */
     protected $fillable = ['last_name','name', 'grade_class_number','username','password'];

     public static $rules = [
        'username' => 'required|confirmed|digits:5|unique:students,student_id',
        'grade_class_number' => 'required|confirmed|digits:6|unique:students,student_id',
        'last_name' => 'required|max:10',
        'name' => 'required|max:10',    
        'password' => 'required|confirmed|between:6,30',
    ];
}
