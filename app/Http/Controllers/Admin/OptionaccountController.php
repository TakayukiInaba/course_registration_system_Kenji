<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


use App\Student;

class OptionaccountController extends Controller
{
    //
    public function indexStudents(){
        $infStudentAccounts = Student::all();
        return view('shingaku.optionstudents',['infStudentAccounts'=>$infStudentAccounts]); 
    }

    public function import(Request $request) 
    {


        Excel::import(new StudentsImport, $request->file('csv_file'));
        //$collection = (new StudentsImport)->toCollection($request->file('csv.file'));
        //$file = $request->file('csv_file');
        //$reader = Excel::load($file->getRealPath());        
        //$collection = (new FastExcel)->import($request->file('csv.file'));
        
        return  redirect()->route('shingaku.accountstudents');
    }

    public function deleteStudent(Request $request) 
    {
        
        $TargetStudentAccount = Student::find($request->id);
        $TargetStudentAccount->delete();
        
        return  redirect()->route('shingaku.accountstudents');
    }


    public function editStudent(Request $request){
        $TargetStudentObj = Student::find($request->id);
        return view('shingaku.editStudent',['TargetStudentObj'=>$TargetStudentObj]); 
 
    }

    public function updateStudent(Request $request)
    {
        //更新処理
        $TargetStudentAccount = Student::find($request->id);
        $last_name = $request->input('last_name');
        $name = $request->input('name');
        $username =  $request->input('username');
        $grade_class_number =  $request->input('grade_class_number');
        $password =  bcrypt($request->input('grade_class_number'));

        $TargetStudentAccount->last_name = $last_name;
        $TargetStudentAccount->name = $name;
        $TargetStudentAccount->username = $username;
        $TargetStudentAccount->grade_class_number= $grade_class_number;
        $TargetStudentAccount->password = $password;

        $TargetStudentAccount->save();
        return  redirect()->route('shingaku.accountstudents');
     }

}



