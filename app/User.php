<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','name', 'email','subject_id','password'
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
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
    public function getSbjVal()
    {
        return $this->subject->value;
    }

}
