<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $guarded = array('id');
    protected $dates = ['deleted_at'];

    //バリデーションルールとメッセージ
    public static $rules = [
        'id'=>'required',
        'title' => 'required|between:1,20',
        'summary' => 'required|between:1,100',
        'teacher_id' => 'integer',
        'fee' => 'numeric|between:0,999999',
    ];

    public static $messages = [
        'id.required' => 'エラーが発生しました。少し時間を置いて再度修正処理を行ってください。',
        'title.required' => '「講座名」を入力してください。',
        'title.between' => '「講座名」は1～20字の間で設定してください。',
        'teacher.integer' => '「エラーが発生しました。恐れ入りますがページ管理者を呼んでください。',
        'fee.numeric' => '「教材費」は半角数字で入力してください。',
        'fee.between' => '「教材費」は999999円までで入力してください。',
        'summary.required' => '「概要」を入力してください',
        'summary.between' => '「概要」は100字以内で入力してください。'
    ];


    /**
     * 他のテーブルとのリレーション関係
     */
    //subjectテーブル
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    public function getSbjVal(){
        return $this->subject->value;
    }


    //termテーブル
    public function term(){
        return $this->belongsTo('App\Term');
    }
    public function getTermVal(){
        return $this->term->value;
    }

    //timeテーブル
    public function time(){
        return $this->belongsTo('App\Time');
    }
    public function getTimeVal(){
        return $this->time->value;
    }

    //gradeテーブル
    public function grade(){
        return $this->belongsTo('App\Grade');
    }
    public function getGradeVal(){
        return $this->grade->value;
    }

    //levelテーブル
    public function level(){
        return $this->belongsTo('App\Level');
    }
    public function getLevelVal(){
        return $this->level->value;
    }

    //teacherテーブル
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
    public function getTeacherVal(){
        return $this->teacher->value;
    }
    

    /*
    *各講座にエントリーしている全生徒を関連付ける
    */
    public function entries(){
        return $this->hasMany('App\Entry')->withTrashed();
    }


    //スコープ

    //時間割作成時に使用
    public function scopeTableTerm($query,$term){
        return $query->where('term_id',$term);
    }
    public function scopeTableTime($query,$time){
        return $query->where('time_id',$time);
    }

    public function scopeTableGrade($query,$grade){
        return $query->where('grade_id',$grade);
    }

    public function scopeTableSubject($query,$sbj){
        return $query->where('subject_id',$sbj);
    }

}
