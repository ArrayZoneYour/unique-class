<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment("唯一ID");
            $table->string('name')->unique()->comment("学号");
            $table->string('email')->unique()->comment("HUST邮箱");
            $table->integer('class_id')->nullable()->comment('班级ID');
            $table->string('password')->comment("密码");
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('eclasses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
