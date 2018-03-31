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
        factory(App\User::class)->create(
            ['first_name' => '自分', 
             'name'      => '自分',
             'email'     => 'bainabainabaina1783@gmail.com',
             'subject_id' => '1', 
            ]);
            factory(App\User::class,9)->create();

        factory(App\Student::class)->create(
            ['first_name' => '自分', 
             'name'      => '自分',
             'email'     => 'bainabainabaina1783@gmail.com',
             'student_id' => '1', 
            ]);
        factory(App\Student::class,1000)->create();
        factory(App\Entry::class,2000)->create();
        factory(App\Course::class,200)->create();

        // $this->call(UsersTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TermsTableSeeder::class);
        $this->call(TimesTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);

    }
}
