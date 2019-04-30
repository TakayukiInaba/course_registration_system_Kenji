<?php
namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Requests\AddRequest;
use illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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
    //新規に講習を追加する画面表示。
     public function add(){
        //formの設定についてはApp\couposers\formcomposerを参照せよ。←もはや使う必要ない？
        $user = Auth::user();
        $items = Course::with(['term', 'time','subject','level','grade','teacher'])->where('subject_id',$user->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->get();
        return view('teacher.course.add',['items'=> $items,]);
    }
    public function addpost(AddRequest $request){
        //バリデーションについてはRequests/AddRequestを参照。←もはや必要ない？
        $course = new Course;
        $params = $request->all();
        unset($params['_token']);
        $course->fill($params)->save();
        return redirect(route('teacher.add'));
    }



    public function edit(Request $request){
        //view内のselect.optionについてはHttp\Composers\FormComposerを参照。←もはや必要ない？
       $course = Course::find($request->id);
       return view('teacher.course.edit',['tgtCourse'=>$course]); 
    }
    public function update(Request $request){
        $validator = Validator::make($request->all(),Course::$rules,Course::$messages);
        if ($validator->fails()){
            return redirect("teacher/edit/$request->id")->withErrors($validator);
        }
        $course = Course::find($request->id);
        $params = $request->all();
        unset($params['_token']);
        $course->fill($params)->save();
        return redirect('teacher/add'); 
     }

    //時間割の作成
    public function table(){
        //viewのselect.optionの中身はHttp\Composers\FormTableComposerを参照。
        return view('teacher.course.table');
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
                //�t�H�[���ɂ��w�N�A���Ȃ̎w�����ď����
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
        
        return view('teacher.course.tablepost',['terms'=>$terms,'times'=>$times,'items'=>$items,]);
    }
    
    public function list(Request $request){
            $user = Auth::user();
            $items = Course::where('subject_id',$user->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->withCount('entries')->get();
            return view('teacher.course.list',['items'=> $items]);  
    }

    public function postList($id){
        $user = Auth::user();
        $items = Course::where('id',$id)->with('entries.student')->get();
        return view('teacher.course.postList',['items'=> $items]);  
    }

    public function cancel(){
        $user = Auth::user();
        $items = Course::where('subject_id',$user->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->withCount('entries')->get();
        return view('teacher.course.cancel',['items'=> $items]); 
    }   

    public function confirmCancel(Request $request){
        $cancels = array();
        foreach ($request->input('cancelnums') as $cancelNum)
        {
             $cancels[] = Course::find($cancelNum);  
        }
        return view('teacher.course.confirm',['cancels'=>$cancels,]);
    }

    public function postCancel(Request $request){
        foreach ($request->input('cancelNums') as $cancelNum)
        {
            //entries�e�[�u���̏���
            //course�e�[�u���̏���
            Entry::where('course_id',$cancelNum)->delete();    
            Course::where('id',$cancelNum)->delete();    
        }
        
        return view('teacher.thanks');     
    }  

}
