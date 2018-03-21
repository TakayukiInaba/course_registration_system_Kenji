<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
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
            'value' => '高1',
        ];
        DB::table('grades')->insert($param);

        $param = [
            'value' => '高２文系',
        ];
        DB::table('grades')->insert($param);

        $param = [
            'value' => '高２理系',
        ];
        DB::table('grades')->insert($param);

        $param = [
            'value' => '高３文系',
        ];
        DB::table('grades')->insert($param);

        $param = [
            'value' => '高３理系',
        ];
        DB::table('grades')->insert($param);

        $param = [
            'value' => 'その他',
        ];
        DB::table('grades')->insert($param);
    }
}
