<?php

use Illuminate\Database\Seeder;

class TimesTableSeeder extends Seeder
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
            'st_time'=> '8:40',
            'lst_time'=> '10:30',
        ];
        DB::table('times')->insert($param);

        $param = [
            'value' => '2',
            'st_time'=> '10:40',
            'lst_time'=> '12:30',
        ];
        DB::table('times')->insert($param);

        $param = [
            'value' => '3',
            'st_time'=> '13:40',
            'lst_time'=> '15:30',
        ];
        DB::table('times')->insert($param);

        $param = [
            'value' => '4',
            'st_time'=> '15:40',
            'lst_time'=> '17:30',
        ];
        DB::table('times')->insert($param);
    }
}
