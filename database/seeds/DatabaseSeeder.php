<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Teacher::class)->create(
            ['value' => '稲葉', 
             'name'      => '崇将',
             'email'     => 'bainabainabaina1783@gmail.com',
             'subject_id' => '1',
             'position_id'  => '1' 
            ]);
            factory(App\Teacher::class,10)->create();

        factory(App\Student::class)->create(
            ['username' => '00000',
             'grade_class_number' => '000000', 
             'last_name' => '赤坂', 
             'name'      => '太郎', 
            ]);

        factory(App\Admin::class)->create(
            ['username' => 'takayuki', 
             'password' => bcrypt('shingakuAdmin'),
            ]);

        factory(App\Course::class,200)->create();
        
        
        $this->call(SubjectsTableSeeder::class);
        $this->call(TermsTableSeeder::class);
        $this->call(TimesTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);

    }
}
