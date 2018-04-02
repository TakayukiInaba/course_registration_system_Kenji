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
    //�����p�̃g�b�v��ʕ\��
    public function index(Request $request){
        $user = Auth::user();
        $items = Course::where('subject_id',$user->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->get();
        return view('course.index',['items'=> $items,'first_name'=>$user->first_name]);  
    }

    //�V�K�o�^��ʂ̕\��
    public function add(){
        //view����select.option��Http\Composers\FormComposer�ɂėp�ӁB
        $user = Auth::user();
        $items = Course::where('subject_id',$user->subject_id)->orderBy('term_id', 'asc')->orderBy('time_id', 'asc')->get();
        return view('course.add',['items'=> $items,]);
    }
    //�o�^����
    public function addpost(AddRequest $request){
        //�o���f�[�V������Requests/AddRequest�Q��
        $course = new Course;
        $params = $request->all();
        unset($params['_token']);
        $course->fill($params)->save();
        return redirect('/add'); 
    }



    public function edit(Request $request){
    //$request�ɂ͏C��������Course��ID�������Ă���B
    //view����select.option��Http\Composers\FormComposer�ɂėp�ӁB
       $course = Course::find($request->id);
       return view('course.edit',['tgtCourse'=>$course]); 
    }

    public function update(Request $request){
        //�o���f�[�V�������[����(addrequest�̓��e+id�o���f�[�V����)��Course���f���Q��
        $validator = Validator::make($request->all(),Course::$rules,Course::$messages);
        if ($validator->fails()){
            return redirect("edit/$request->id")->withErrors($validator);
        }

        //�X�V����
        $course = Course::find($request->id);
        $params = $request->all();
        unset($params['_token']);
        $course->fill($params)->save();
        return redirect('/add'); 
     }

    //���Ԋ���ʕ\��
    public function table(){
        //view����select.option��Http\Composers\FormTableComposer�ɂėp�ӁB
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
                //�t�H�[���ɂ��w�N�A���Ȃ̎w�����ď�������
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
            //entries�e�[�u���̏���
            //course�e�[�u���̏���
            Entry::where('course_id',$cancelNum)->delete();    
            Course::where('id',$cancelNum)->delete();    
        }
        
        $message = '�폜���������܂����B';
        return view('components.thanks',['message'=>$message,]);     
    }  

}
