<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
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
                    'value' => '基礎',
                ];
                DB::table('levels')->insert($param);
        
                $param = [
                    'value' => '標準',
                ];
                DB::table('levels')->insert($param);
        
                $param = [
                    'value' => '発展',
                ];
                DB::table('levels')->insert($param);
        
                $param = [
                    'value' => 'その他',
                ];
                DB::table('levels')->insert($param);
        
        
            
        
    }
}
