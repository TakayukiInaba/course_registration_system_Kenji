<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entry;
use App\Course;
use App\Term;
use App\Time;
use Carbon\Carbon; // 日付関連操作に

class IndexController extends Controller
{
    //
    /**
    * TOP画面表示
    */
    public function index(Request $request)
    {
        $terms = Term::all();
        $times = Time::all();
        $student = auth()->user();
        $items = Entry::where('student_id',$student->student_id)->with(
            ['term','time','course.grade','course.level','course.subject','course.teacher'])->get();
        $entries = array();
        
            foreach($terms as $term){
                foreach($times as $time){
                    $entries += array( $term->id.$time->id => array("id"=>"0","title"=>'登録なし'));
                    if($items->isNotEmpty()){
                        foreach($items as $item){
                            if($item->getCourseTerm() == $term->value and $item->getCourseTime() == $time->value)
                            {
                                $entries[$term->id.$time->id] = ["id"=>$item->course_id,
                                                                "title"=>$item->getCourseTitle(),
                                                                 "grade"=>$item->getCourseGrade(),
                                                                 "level"=>$item->getCourseLevel(),
                                                                 "teacher"=>$item->getCourseTeacher(),
                                                                 "fee"=>$item->getCourseFee(),
                                                                 "summary"=>$item->getCourseSummary(),];
                                break; 
                            }
                        }
                    }
                }
            }
        
        return view('student.index',['items'=> $items,'entries'=> $entries,'student'=>$student,'terms'=>$terms,'times'=>$times]); 
    }

     //
    /**
    * 講座登録画面表示
    */
    public function entry()
    {
        $courses = course::with(['term','time'])->get();
        $terms = Term::all();
        $times = Time::all();
        $items = array();

            foreach ($terms as $term){
                foreach ($times as $time){
                    $items += array($term->id.$time->id => Course::tableTerm($term->id)->tableTime($time->id)->get());
                }    
            }
       
        return view('student.entry',['terms'=>$terms,'times'=>$times,'items'=>$items,]); 
    }

      //
    /**
    * 確認画面表示
    */

    public function confirm(Request $request)
    {
        $entries = array();
        foreach ($request->input('entries') as $entry)
        {
            if ($entry != 0)
            {
                $entries[] = Course::find($entry);
            }   
        }
        return view('student.confirm',['entries'=>$entries,]); 
    }

      //
    /**
    * 登録処理
    */
    public function postEntry(Request $request)
    {
        $records = array();
        $student = auth()->user();
        $now = Carbon::now();
        foreach ($request->input('entries') as $entry)
        {
            $item = Course::find($entry);
            $records[] = ['student_id'=>$student->id, 'course_id'=>$entry,'term_id'=>$item->term_id,
                          'time_id'=>$item->time_id, 'created_at'=>$now ,'updated_at'=>$now];  
        }
        Entry::insert($records);
        return view('student.PostEntry');        
    }

      //
    /**
    * 単品での新規登録・更新
    */
    public function singleEntry($term,$time,$id)
    {
        //特定の期間、時限の講座一覧を表示させるためのデータ
        $items = Course::where('term_id',$term)->where('time_id',$time)->with(
            ['term','time','grade','level','subject','teacher'])->get();
        
        $term = Term::find($term);
        $time = Time::find($time);

        return view('student.singleEntry',['items'=>$items,'id'=>$id,
                                            'term'=>$term,'time'=>$time,]);        
    }

    public function postSingleEntry(Request $request)
    {
        $student = auth()->user();
        $entryId = $request->input('entry');//entry
        $entryTerm = $request->input('entryTerm');
        $entryTime = $request->input('entryTime');

        $targetRecord = Entry::where('student_id',$student)->where('term_id',$entryTerm)->where('time_id',$entryTime)->get();
        if ($targetRecord->isEmpty())
        {
            //新規登録処理
            $entry = new Entry;
            $params = array();
            $params[] = ['student_id'=>$student->id,'term_id'=>$entryTerm,'time_id'=>$entryTime,'course_id'=>$entryId,]; 
            $entry->fill($params)->save(); 

        }else{
            //更新処理
            $params = array();
            $params[] = ['student_id'=>$student->id,'term_id'=>$entryTerm,'time_id'=>$entryTime,'course_id'=>$entryId,]; 
            $targetRecord->fill($params)->save();
        }
        
        return view('student.PostEntry');   

    }

}
