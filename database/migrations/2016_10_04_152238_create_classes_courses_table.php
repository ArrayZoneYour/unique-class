<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id');
            $table->integer('course_id');
            $table->timestamps();

            $table->unique(['class_id', 'course_id']);
            $table->foreign('class_id')->references('id')->on('eclasses');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes_courses');
    }
}
