<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entry;
use App\Course;
use App\Term;
use App\Time;
use Carbon\Carbon; // 日付関連操作に
use PDF;
use Illuminate\Support\Collection;

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
        $items = Entry::where('student_id',$student->id)->with(
            ['term','time','course.grade','course.level','course.subject','course.teacher'])->get();
        $entries = array();
        
        //$itemsにはログイン済み生徒の登録講座を格納
            foreach($terms as $term){
                foreach($times as $time){
                    $entries += array( $term->id.$time->id => array("id"=>"0","title"=>""));
                    if($items->isNotEmpty()){
                        foreach($items as $item){
                            if($item->getCourseTerm() == $term->value && $item->getCourseTime() == $time->value)
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

    //pdf時間割表印刷
    public function pdfTimeTable(Request $request)
    {
        $terms = Term::all();
        $times = Time::all();
        $student = auth()->user();
        $items = Entry::where('student_id',$student->id)->with(
            ['term','time','course.grade','course.level','course.subject','course.teacher'])->orderBy('term_id')->orderBy('time_id')->get();
        $season = "";
        $term = $terms ->first();
            switch (date('n',strtotime($term->st_day))) {
            case 7:
                $season="夏"; 
                break;
            case 8:
                $season="夏";
                break;
            case 12:
                $season="夏";
                break;
            case 1:
                $season="冬";
                break; 
            default:
                $season="??";
                break;
            }
        
        $title = date('Y年度') . $season. "期講習受講票";
        
        $pdf = \PDF::loadView('student.pdfTimeTable',['items'=> $items,'items'=> $items,'student'=>$student,'terms'=>$terms,'times'=>$times,'title'=>$title]);
        return $pdf->stream('shingakukosshu_jukohyo.pdf');
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
        $student = auth()->user();
        $entries = Entry::where('student_id',$student->id)->get();
        $items = array();
            
            $Collection_of_Entries = new Collection();
            foreach($entries as $entry){
                $Collection_of_Entries->push($entry->course_id);
            }

            foreach ($terms as $term){
                foreach ($times as $time){
                    $items += array($term->id.$time->id => Course::tableTerm($term->id)->tableTime($time->id)->get());
                }    
            }
       
        return view('student.entry',['terms'=>$terms,'times'=>$times,'items'=>$items,'Collection_of_Entries'=>$Collection_of_Entries]); 
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
        foreach ($request->input('entries') as $entryId)
        {
            $objCourse = Course::find($entryId);  
            Entry::updateOrCreate(['student_id'=>$student->id,'term_id'=>$objCourse->term_id,'time_id'=>$objCourse->time_id],['course_id'=>$entryId,]);
        }
       
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
        $entryId = $request->input('entry');
        $entryTerm = $request->input('entryTerm');
        $entryTime = $request->input('entryTime');

        if($entryId=='0')
        {
           Entry::where('student_id',$student->id)->where('term_id',$entryTerm)->where('time_id',$entryTime)->forceDelete();    
        }else{
           Entry::updateOrCreate(['student_id'=>$student->id,'term_id'=>$entryTerm,'time_id'=>$entryTime],['course_id'=>$entryId,]);
        }
        return view('student.postEntry');   
    }

}
