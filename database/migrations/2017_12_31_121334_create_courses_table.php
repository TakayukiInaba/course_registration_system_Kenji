<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('term_id');
            $table->unsignedTinyInteger('time_id');
            $table->unsignedTinyInteger('subject_id');
            $table->unsignedTinyInteger('grade_id');
            $table->unsignedTinyInteger('level_id');
            $table->string('title',20);
            $table->string('summary',100);
            $table->unsignedTinyInteger('teacher_id');
            $table->unsignedMediumInteger('fee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
