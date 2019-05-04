<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Exports\canceledEntriesExport;
use App\Exports\FeeEntriesExport;
use App\Exports\CoursesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Entry;
use App\Course;
use PDF;

class JobmanagementController extends Controller
{
    //講座キャンセル後処理
    //
    //

    public function cancelList(){
        $ghostEntries = Entry::with(['student','course'])->onlyTrashed()
            ->orderBy("student_id")->orderBy("term_id")->orderBy("time_id")->get();
        return view('shingaku.canceled_list',['ghostEntries'=>$ghostEntries]); 
    }

    public function cancelListExportPdf(){
        $ghostEntries = Entry::with(['student','course'])->onlyTrashed()
            ->orderBy("student_id")->orderBy("term_id")->orderBy("time_id")->get(); 
        $pdf = \PDF::loadView('shingaku.exports.pdfCanceledList',compact('ghostEntries'));
        return $pdf->stream('canceled_list.pdf');
    }

    public function cancelListExportExcel(){
       // return Excel::download(new CanceledEntriesExport, 'canceledEntries.csv');
        return (new CanceledEntriesExport)->download('canceledEntries.csv');
    }


    //料金支払い処理
    //
    //

    public function feeList(){
        $feeEntries = Entry::with(['student','course']) 
           ->orderBy("student_id")->orderBy("term_id")->orderBy("time_id")->get();
        
        $filtered =  $feeEntries->filter(function($feeEntry){
            return $feeEntry->course->fee <> 0;
        }); 
        
        return view('shingaku.fee_list',['feeEntries'=>$filtered]); 

    }

    public function feeListExportPdf(){
        $feeEntries = Entry::with(['student','course']) 
           ->orderBy("student_id")->orderBy("term_id")->orderBy("time_id")->get();
        
        $newFeeEntries =  $feeEntries->filter(function($feeEntry){
            return $feeEntry->course->fee <> 0;
        }); 

        $pdf = \PDF::loadView('shingaku.exports.pdfFeeList',compact('newFeeEntries'));
        return $pdf->stream('fee_list.pdf');
    }

    public function feeListExportExcel(){
        return Excel::download(new FeeEntriesExport, 'feeEntries.csv');
     }

     
     public function csvOutput(){
        $entries = Course::with(['term', 'time','subject','level','grade','teacher'])->withCount('entries') 
        ->orderBy("term_id")->orderBy("time_id")->orderBy("subject_id")->orderBy("grade_id")->orderBy("time_id")
        ->get();
        
        return view('shingaku.csvoutput',['Entries'=>$entries]); 

    }

    public function coursesListExportExcel(){
        return Excel::download(new CoursesExport, 'Courses.csv');
     }
    

}



