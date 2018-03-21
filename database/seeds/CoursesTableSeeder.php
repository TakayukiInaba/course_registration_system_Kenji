<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'term_id' => '1',
            'time_id'  => '1',
            'subject_id' => '1',
            'grade_id'=> '1',
            'level_id'=> '2',
            'title'=> '古文標準',
            'summary'=> '入試問題演習を行います。',
            'teacher_id'=> '2',
            'fee'=> '0'
        ];
        DB::table('courses')->insert($param);

        $param = [
            'term_id' => '1',
            'time_id'  => '2',
            'subject_id' => '2',
            'grade_id'=> '2',
            'level_id'=> '2',
            'title'=> '世界史演習',
            'summary'=> '徹底的に入試問題演習を行います。',
            'teacher_id'=> '3',
            'fee'=> '200'
        ];
        DB::table('courses')->insert($param);

        $param = [
            'term_id' => '1',
            'time_id'  => '3',
            'subject_id' => '3',
            'grade_id'=> '2',
            'level_id'=> '2',
            'title'=> '微分積分',
            'summary'=> '難易度高めです。',
            'teacher_id'=> '4',
            'fee'=> '0'
        ];
        DB::table('courses')->insert($param);

        $param = [
            'term_id' => '1',
            'time_id'  => '4',
            'subject_id' => '4',
            'grade_id'=> '2',
            'level_id'=> '2',
            'title'=> '化学入門',
            'summary'=> '入門講座ですので、だれでもウェルカムです。',
            'teacher_id'=> '5',
            'fee'=> '0'
        ];
        DB::table('courses')->insert($param);
    }
}
