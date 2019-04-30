<?php

namespace App\Exports;

use App\Entry;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;



class FeeEntriesExport implements FromCollection ,WithHeadings,WithStrictNullComparison
{
    use Exportable;
    public function collection(){
        return DB::table('entries')->select('students.username','students.last_name',
            'students.name','entries.term_id','entries.time_id','courses.title','teachers.value','courses.fee')
        ->join('students', 'entries.student_id', '=', 'students.id')
        ->join('courses', 'entries.course_id', '=', 'courses.id')
        ->join('teachers', 'courses.teacher_id', '=', 'teachers.id')
        ->join('terms', 'courses.term_id', '=', 'terms.id')
        ->join('times', 'courses.time_id', '=', 'times.id')
        ->where('courses.fee', '<>', 0)
        ->orderBy("student_id")->orderBy("terms.id")->orderBy("times.id")->get();
    }
    public function headings(): array
    {
        return [
            '学籍番号',
            '姓',
            '名前',
            '期',
            '限',
            '講座名',
            '担当',
            '教材費',
        ];
    }
}

