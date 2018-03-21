<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $guarded = array('id');

    //
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }

}
