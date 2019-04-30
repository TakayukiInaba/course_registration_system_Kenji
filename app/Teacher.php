<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    //  
    protected $fillable = ['value','name', 'email','subject_id','position_id','password'];
     /**
     * バリデーション用ルール設定
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:10',
        'value' => 'required|max:10',
        'email' => 'required|email|max:80|unique:teachers,email',
        'subject_id' => 'required|digits:1',
        'position_id' => 'required|digits:1',
        'password' => 'required|confirmed|between:6,30',
    ];

    public static $messages = [
        'value.required' => '「姓」を入力してください。',
        'value.between' => '「姓」は1～10字の間で設定してください。',
        'name.required' => '「名前」を入力してください。',
        'name.between' => '「名前」は1～10字の間で設定してください。',
        'position_id.required' => '「役職」を選択してください。',
        'subject_id.integer' => '「教科」を選択してください。',
    ];

    
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    public function getSubjectVal(){
        return $this->subject->value;
    }

    public function position(){
        return $this->belongsTo('App\Position');
    }
    public function getPositionVal(){
        return $this->position->value;
    }
    public function getPositionUnitPrice(){
        return $this->position->unit_price;
    }
}
