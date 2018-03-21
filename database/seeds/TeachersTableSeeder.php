<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
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
            'value' => '及川',
            'name'  => '謙',
            'position' => '専任',
            'subject_id'=>'1'
        ];
        DB::table('teachers')->insert($param);

        $param = [
            'value' => '稲葉',
            'name'  => '崇将',
            'position' => '専任',
            'subject_id'=>'1'
        ];
        DB::table('teachers')->insert($param);

        $param = [
            'value' => '岩本',
            'name'  => '学',
            'position' => '講師',
            'subject_id'=>'1'
        ];
        DB::table('teachers')->insert($param);

        $param = [
            'value' => '古川',
            'name'  => '文信',
            'position' => '専任',
            'subject_id'=>'2'
        ];
        DB::table('teachers')->insert($param);

        $param = [
            'value' => '遠藤',
            'name'  => '聖彦',
            'position' => '専任',
            'subject_id'=>'3'
        ];
        DB::table('teachers')->insert($param);

        $param = [
            'value' => '岡本',
            'name'  => '卓也',
            'position' => '専任',
            'subject_id'=>'4'
        ];
        DB::table('teachers')->insert($param);

        $param = [
            'value' => '岡本',
            'name'  => '卓也',
            'position' => '専任',
            'subject_id'=>'4'
        ];
        DB::table('teachers')->insert($param);

        $param = [
            'value' => '城',
            'name'  => '義範',
            'position' => '専任',
            'subject_id'=>'5'
        ];
        DB::table('teachers')->insert($param);

        $param = [
            'value' => '安田',
            'name'  => '崇真子',
            'position' => '講師',
            'subject_id'=>'5'
        ];
        DB::table('teachers')->insert($param);


    }
}
