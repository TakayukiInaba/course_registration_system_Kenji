<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Entry;
use App\Course;
use App\Term;
use App\Time;
use App\Level;
use App\Grade;
use App\Teacher;
use App\Subject;
use App\Position;
use Carbon\Carbon;

use Validator;

class IndexController extends Controller
{
    //
    /**
    * TOP画面表示
    */
    public function index(Request $request)
    {
        
        return view('shingaku.index'); 
    }

    //
    /**
    * テーブル設定
    */
    //「期間」の設定 
    public function termOption(){
        $terms = Term::all();
        return view('shingaku.termoption',['terms'=>$terms,]);  
    }

    public function addTerm(Request $request){
        $term = new Term;
        $value = $request->input('value');
        $stDay = date("Y").'-'.$request->input('st_month') .'-'. $request->input('st_day');
        $lstDay =  date("Y").'-'.$request->input('lst_month') .'-'. $request->input('lst_day');

        $term->value = $value;
        $term->st_day = $stDay;
        $term->lst_day = $lstDay;

        $term->save();
        return redirect(route('shingaku.termoption'));
    }

    public function editTerm(Request $request){
        //$requestには修正したいtermのIDが入っている。
        //view内のselect.optionはHttp\Composers\FormComposerにて用意。
           $TargetTermObj = Term::find($request->id);
           return view('shingaku.editTerm',['TargetTermObj'=>$TargetTermObj]); 
    }
    
    public function updateTerm(Request $request){
        //バリデーションルールは(addrequestの内容+idバリデーション)はCourseモデル参照
        //更新処理
        $term = Term::find($request->id);
        $value = $request->input('value');
        $stDay = date("Y").'-'.$request->input('st_month') .'-'. $request->input('st_day');
        $lstDay =  date("Y").'-'.$request->input('lst_month') .'-'. $request->input('lst_day');

        $term->value = $value;
        $term->st_day = $stDay;
        $term->lst_day = $lstDay;

        $term->save();
         return redirect(route('shingaku.termoption')); 
     }

     public function deleteTerm(Request $request){
        $TargetTermInf = Term::find($request->id);
        $TargetTermInf->delete();
        return redirect(route('shingaku.termoption')); 
     }
    
    //「時限」の設定
    public function timeOption(){
        $times = Time::all();
        return view('shingaku.timeoption',['times'=>$times,]);  
    }

    public function addTime(Request $request){
        $time = new Time;
        $value = $request->input('value');
        $stTime = $request->input('st_hour').':'.$request->input('st_min') .':00';
        $lstTime =  $request->input('lst_hour').':'.$request->input('lst_min') .':00';

        $time->value = $value;
        $time->st_time = $stTime;
        $time->lst_time = $lstTime;

        $time->save();
        return redirect(route('shingaku.timeoption'));
    }
    
    public function editTime(Request $request){
        //$requestには修正したいtermのIDが入っている。
        //view内のselect.optionはHttp\Composers\tabletimeedittimeComposerにて用意。
        $TargetTimeObj = Time::find($request->id);
        return view('shingaku.editTime',['TargetTimeObj'=>$TargetTimeObj]); 
    }

    public function updateTime(Request $request){
        $time = Time::find($request->id);
        $value = $request->input('value');
        $stTime = $request->input('st_hour').':'.$request->input('st_min') .':00';
        $lstTime =  $request->input('lst_hour').':'.$request->input('lst_min') .':00';

        $time->value = $value;
        $time->st_time = $stTime;
        $time->lst_time = $lstTime;

        $time->save();
         return redirect(route('shingaku.timeoption')); 
     }

    public function deleteTime(Request $request){
        $TargetTimeInf = Time::find($request->id);
        $TargetTimeInf->delete();
        return redirect(route('shingaku.timeoption')); 
     }
    
    //「学年」設定
    public function gradeOption(){
        $grades = Grade::all();
        return view('shingaku.optiongrade',['grades'=>$grades,]);  
    }
    public function addGrade(Request $request){
        $grade = new Grade;
        $value = $request->input('value');
        $grade->value = $value;
        $grade->save();
        return redirect(route('shingaku.gradeoption'));
    }
    public function editGrade(Request $request){
        $TargetGradeObj = Grade::find($request->id);
        return view('shingaku.editGrade',['TargetGradeObj'=>$TargetGradeObj]); 
    }
    public function updateGrade(Request $request){
        $grade = Grade::find($request->id);
        $value = $request->input('value');
        $grade->value = $value;
        $grade->save();
         return redirect(route('shingaku.gradeoption')); 
     }
    public function deleteGrade(Request $request){
        $TargetGradeInf = Grade::find($request->id);
        $TargetGradeInf->delete();
        return redirect(route('shingaku.gradeoption')); 
     }
    
     //「レベル」設定
    public function levelOption(){
        $levels = Level::all();
        return view('shingaku.optionlevel',['levels'=>$levels,]);  
    }
    public function addLevel(Request $request){
        $level = new Level;
        $value = $request->input('value');
        $level->value = $value;
        $level->save();
        return redirect(route('shingaku.leveloption'));
    }
    public function editLevel(Request $request){
        $TargetLevelObj = Level::find($request->id);
        return view('shingaku.editLevel',['TargetLevelObj'=>$TargetLevelObj]); 
    }
    public function updateLevel(Request $request){
        $Level = Level::find($request->id);
        $value = $request->input('value');
        $Level->value = $value;
        $Level->save();
         return redirect(route('shingaku.leveloption')); 
     }
    public function deleteLevel(Request $request){
        $TargetLevelInf = Level::find($request->id);
        $TargetLevelInf->delete();
        return redirect(route('shingaku.leveloption')); 
     }
    
    //「教員」の設定 
    public function teacherOption(){
        $teachers = Teacher::with(['subject','position'])->orderBy('subject_id', 'asc')->get();
        $subjects = Subject::all();
        $positions = Position::all();
        return view('shingaku.optionteacher',compact('teachers','subjects','positions'));  
    }
    public function addTeacher(Request $request){
        $validator = Validator::make($request->all(),Teacher::$rules,Teacher::$messages);
        if ($validator->fails()){
            return redirect(route('shingaku.teacheroption'))->withErrors($validator);
        }
        $teacher = new Teacher;
        $params = $request->all();
        unset($params['_token']);
        $teacher->fill($params)->save();
        return redirect(route('shingaku.teacheroption'));
    }
    public function editTeacher(Request $request){
        $TargetTeacherObj = Teacher::find($request->id);
        return view('shingaku.editTeacher',['TargetTeacherObj'=>$TargetTeacherObj]); 
    }

    public function updateTeacher(Request $request){
        $teacher = Teacher::find($request->id);
        $params = $request->all();
        unset($params['_token']);
        $teacher->fill($params)->save();
         return redirect(route('shingaku.teacheroption')); 
     }
    public function deleteTeacher(Request $request){
        $TargetTeacherInf = Teacher::find($request->id);
        $TargetTeacherInf->delete();
        return redirect(route('shingaku.teacheroption')); 
     }

     //
    /**
    * 管理者設定
    */
    public function adminOption()
    {
        $adminUser = Admin::all(); 
      
        return view('shingaku.optionAdmin',['adminUser'=>$adminUser,]); 
    }
    
    public function adminAdd(Request $request)
    {
        
        $adminUser = Admin::all();
       

        //更新処理
        $admin = Admin::find(1);
        $admin->username = $request->input('username');
        $admin->password = bcrypt($request->input('password'));
        $admin->save();
       
        return view('shingaku.adminoption',['adminUser'=>$adminUser]);  
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
  

}
