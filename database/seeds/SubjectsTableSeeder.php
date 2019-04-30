<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
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
            'value' => '国語'
        ];
        DB::table('subjects')->insert($param);

        $param = [
            'value' => '社会'
        ];
        DB::table('subjects')->insert($param);

        $param = [
            'value' => '数学'
        ];
        DB::table('subjects')->insert($param);

        $param = [
            'value' => '理科'
        ];
        DB::table('subjects')->insert($param);

        $param = [
            'value' => '英語'
        ];
        DB::table('subjects')->insert($param);

        $param = [
            'value' => 'その他'
        ];
        DB::table('subjects')->insert($param);

    }
}
