<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use App\Courses;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class CoursesExport implements FromCollection,WithHeadings,WithStrictNullComparison
{
    use Exportable;
    public function collection(){
        return DB::table('courses')
        ->select('terms.value','times.value',
            'grades.value','levels.value','courses.title',
            'teachers.value','teachers.name','count(*) from entries')
        ->join('entries', 'courses.id', '=', 'entries.course_id')
        ->join('teachers', 'courses.teacher_id', '=', 'teachers.id')
        ->join('terms', 'courses.term_id', '=', 'terms.id')
        ->join('times', 'courses.time_id', '=', 'times.id')
        ->join('subjects', 'courses.subject_id', '=', 'subjects.id')
        ->join('grades', 'courses.grade_id', '=', 'grades.id')
        ->join('levels', 'courses.level_id', '=', 'levels.id')
        ->orderBy("courses.term_id")->orderBy("courses.times.id")
        ->orderBy("cpurses.subjects.id")->orderBy("courses.grade_id")
        ->orderBy("courses.level_id")->get();
    }
    public function headings(): array
    {
        return [
            '期',
            '限',
            '学年',
            'レベル',
            '講座名',
            '担当(姓)',
            '担当(名)',
            '人数',
        ];
    }
}
