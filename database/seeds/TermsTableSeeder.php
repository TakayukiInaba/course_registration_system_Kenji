<?php

use Illuminate\Database\Seeder;

class TermsTableSeeder extends Seeder
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
            'value' => '1',
            'st_day'=> '2018-7-20',
            'lst_day'=> '2018-7-23',
        ];
        DB::table('terms')->insert($param);

        $param = [
            'value' => '2',
            'st_day'=> '2018-7-24',
            'lst_day'=> '2018-7-27',
        ];
        DB::table('terms')->insert($param);

        $param = [
            'value' => '3',
            'st_day'=> '2018-7-28',
            'lst_day'=> '2018-7-30',
        ];
        DB::table('terms')->insert($param);

        $param = [
            'value' => '4',
            'st_day'=> '2018-8-1',
            'lst_day'=> '2018-8-3',
        ];
        DB::table('terms')->insert($param);

        $param = [
            'value' => '5',
            'st_day'=> '2018-8-4',
            'lst_day'=> '2018-8-7',
        ];
        DB::table('terms')->insert($param);

        $param = [
            'value' => '6',
            'st_day'=> '2018-8-8',
            'lst_day'=> '2018-8-10',
        ];
        DB::table('terms')->insert($param);
    }
}
