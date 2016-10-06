<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsCoursesTable extends Migration
{
    /**
     * Run the migrations.
     * 利用关联表的结果结合where即可筛选出指定班级的课程信息
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->comment('课程唯一代码');
            $table->integer('classroom_id');
            $table->integer('begin_week');
            $table->integer('end_week');
            $table->integer('weekday')->comment('上课为星期几');
            $table->integer('begin_class')->comment('从第几节开始上课');
            $table->integer('end_class')->comment('到第几节课结束');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms_courses');
    }
}
