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
     protected $fillable = ['first_name','name', 'email','student_id','password'];
}
