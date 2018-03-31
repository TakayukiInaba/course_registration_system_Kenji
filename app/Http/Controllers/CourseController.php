<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddRequest;
use illuminate\Support\Facades\Auth;
use App\Term;
use App\Time;
use App\Subject;
use App\Grade;
use App\Level;
use App\Teacher;
use App\User;
use App\Course;
use App\Entry;

use Validator;

class CourseController extends Controller
{
    //教員用のトップ画面表示
    public function index(Request $request){
        $user = Auth::user();
        $items = Course::where('subject_id',$user->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->get();
        return view('course.index',['items'=> $items,'first_name'=>$user->first_name]);  
    }

    //新規登録画面の表示
    public function add(){
        //view内のselect.optionはHttp\Composers\FormComposerにて用意。
        $user = Auth::user();
        $items = Course::where('subject_id',$user->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->get();
        return view('course.add',['items'=> $items,]);
    }
    //登録処理
    public function addpost(AddRequest $request){
        //バリデーションはRequests/AddRequest参照
        $course = new Course;
        $params = $request->all();
        unset($params['_token']);
        $course->fill($params)->save();
        return redirect('/add'); 
    }



    public function edit(Request $request){
    //$requestには修正したいCourseのIDが入っている。
    //view内のselect.optionはHttp\Composers\FormComposerにて用意。
       $course = Course::find($request->id);
       return view('course.edit',['tgtCourse'=>$course]); 
    }

    public function update(Request $request){
        //バリデーションルールは(addrequestの内容+idバリデーション)はCourseモデル参照
        $validator = Validator::make($request->all(),Course::$rules,Course::$messages);
        if ($validator->fails()){
            return redirect("edit/$request->id")->withErrors($validator);
        }

        //更新処理
        $course = Course::find($request->id);
        $params = $request->all();
        unset($params['_token']);
        $course->fill($params)->save();
        return redirect('/add'); 
     }

    //時間割画面表示
    public function table(){
        //view内のselect.optionはHttp\Composers\FormTableComposerにて用意。
        return view('course.table');
    }


    public function tablepost(Request $request){
        $terms = Term::all();
        $times = Time::all();
        $subject = $request->input('subject_id');
        $grade = $request->input('grade_id');

        $items = array();
        foreach ($terms as $term)
        {
            foreach ($times as $time)
            { 
                //フォームによる学年、教科の指定よって条件分岐
               if ($subject == 0 and $grade == 0){
                    $items += array($term->id.$time->id => Course::tableTerm($term->id)->tableTime($time->id)->get());
               }elseif($grade <> 0 and $subject == 0){
                    $items += array($term->id.$time->id => Course::tableTerm($term->id)->tableTime($time->id)->tableGrade($grade)->get());
               }elseif($subject <> 0 and $grade == 0){
                    $items += array($term->id.$time->id => Course::tableTerm($term->id)->tableTime($time->id)->tableSubject($subject)->get());
               }elseif($grade <> 0 and $subject <> 0){
                    $items += array($term->id.$time->id => Course::tableTerm($term->id)->tableTime($time->id)->tableGrade($grade)->tableSubject($subject)->get());
               }
            }
        }
        
        return view('course.tablepost',['terms'=>$terms,'times'=>$times,'items'=>$items,]);
    }
    
    public function list(Request $request){
            $user = Auth::user();
            $items = Course::where('subject_id',$user->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->withCount('entries')->get();
            return view('course.list',['items'=> $items]);  
    }

    public function postList($id){
        $user = Auth::user();
        $items = Course::where('id',$id)->with('entries.student')->get();
        return view('course.postList',['items'=> $items]);  
    }

    public function cancel(){
        $user = Auth::user();
        $items = Course::where('subject_id',$user->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->withCount('entries')->get();
        return view('course.cancel',['items'=> $items]); 
    }   

    public function confirmCancel(Request $request){
        $cancels = array();
        foreach ($request->input('cancelnums') as $cancelNum)
        {
             $cancels[] = Course::find($cancelNum);  
        }
        return view('course.confirm',['cancels'=>$cancels,]);
    }

    public function postCancel(Request $request){
        foreach ($request->input('cancelNums') as $cancelNum)
        {
            //entriesテーブルの処理
            //courseテーブルの処理
            Entry::where('course_id',$cancelNum)->delete();    
            Course::where('id',$cancelNum)->delete();    
        }
        
        $message = '削除が完了しました。';
        return view('components.thanks',['message'=>$message,]);     
    }  

}
