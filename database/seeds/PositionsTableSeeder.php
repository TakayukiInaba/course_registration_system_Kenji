<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
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
            'value' => '専任',
            'unit_price' => '510'
        ];
        DB::table('positions')->insert($param);

        $param = [
            'value' => '講師',
            'unit_price' => '710'
        ];
        DB::table('positions')->insert($param);

        $param = [
            'value' => '助手',
            'unit_price' => '700'
        ];
        DB::table('positions')->insert($param);

        $param = [
            'value' => '管理職',
            'unit_price' => '500'
        ];
        DB::table('positions')->insert($param);
    }
}
