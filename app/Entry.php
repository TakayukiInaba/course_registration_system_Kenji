<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'student_id','course_id','term_id','time_id','created_at' , 'updated_at'
    ];

    //講座マスタとのリレーション作成
    public function course(){
        return $this->belongsTo('App\Course');
    }
    public function Term(){
        return $this->belongsTo('App\Term');
    }
    public function Time(){
        return $this->belongsTo('App\Time');
    }
    public function getCourseTitle(){
        return $this->course->title;
    }
    public function getCourseSummary(){
        return $this->course->summary;
    }
    public function getCourseTerm(){
        return $this->term->value;
    }
    public function getCourseTime(){
        return $this->time->value;
    }
    public function getCourseGrade(){
        return $this->course->grade->value;
    }
    public function getCourseLevel(){
        return $this->course->level->value;
    }
    public function getCourseSubject(){
        return $this->course->subject->value;
    }
    public function getCourseTeacher(){
        return $this->course->teacher->value;
    }
    public function getCourseFee(){
        return $this->course->fee;
    }

    //生徒マスタとのリレーション作成
    public function student(){
        return $this->belongsTo('App\Student');
    }
    public function getStudentId(){
        return $this->student->student_id;
    }
    public function getStudentName(){
        return $this->student->name;
    }
    public function getStudentFirstName(){
        return $this->student->first_name;
    }

}
