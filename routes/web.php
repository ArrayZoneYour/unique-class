<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*类定义方法*/

function user_ins() {
	return new UniqueClass\User;
}

function class_ins() {
	return new UniqueClass\Eclass;
}

function teacher_ins() {
	return new UniqueClass\Teacher;
}

function classroom_ins() {
	return new UniqueClass\Classroom;
}

function course_ins() {
	return new UniqueClass\Course;
}

function homework_ins() {
	return new UniqueClass\Homework;
}

function class_course_ins() {
	return new UniqueClass\Classes_course;
}

function course_teacher_ins() {
	return new UniqueClass\Courses_teacher;
}

function classroom_course_ins() {
	return new UniqueClass\Classrooms_course;
}

/*工具方法*/

function suc($data_to_add, $msg=null) {
	$data = ['status' => 1, 'msg' => $msg, 'data' => []];
	if($data_to_add)
		$data['data'] = $data_to_add;
	return $data;
}

function err($msg = null) {
	return ['status' => 0, 'msg' => $msg];
}

function rq($key=null, $default=null)
{
	if(!$key) return Request::all();
	return Request::get($key, $default);
}

/*路由定义*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::any('/home', 'HomeController@index');

Route::any('/api/user/read', function() {
	return user_ins()->read();
});

Route::any('/api/user/change', function() {
	return user_ins()->change();
});

Route::any('/api/class/add', function() {
	return class_ins()->add();
});

Route::any('/api/class/read', function() {
	return class_ins()->read();
});

Route::any('/api/class/remove', function() {
	return class_ins()->remove();
});

Route::any('/api/class/count', function() {
	return class_ins()->count();
});

Route::any('/api/class/addCourse', function() {
	return class_ins()->addCourse();
});

Route::any('/api/class/readCourse', function() {
	return class_ins()->readCourse();
});

Route::any('/api/class/change', function() {
	return class_ins()->change();
});

Route::any('/api/teacher/add', function() {
	return teacher_ins()->add();
});

Route::any('/api/teacher/read', function() {
	return teacher_ins()->read();
});

Route::any('/api/teacher/remove', function() {
	return teacher_ins()->remove();
});

Route::any('/api/teacher/change', function() {
	return teacher_ins()->change();
});

Route::any('/api/teacher/count', function() {
	return teacher_ins()->count();
});

Route::any('/api/classroom/add', function() {
	return classroom_ins()->add();
});

Route::any('/api/classroom/read', function() {
	return classroom_ins()->read();
});

Route::any('/api/classroom/remove', function() {
	return classroom_ins()->remove();
});

Route::any('/api/classroom/change', function() {
	return classroom_ins()->change();
});

Route::any('/api/classroom/count', function() {
	return classroom_ins()->count();
});

Route::any('/api/course/add', function() {
	return course_ins()->add();
});

Route::any('/api/course/read', function() {
	return course_ins()->read();
});

Route::any('/api/course/remove', function() {
	return course_ins()->remove();
});

Route::any('/api/course/change', function() {
	return course_ins()->change();
});

Route::any('/api/course/count', function() {
	return course_ins()->count();
});

Route::any('/api/course/addTeacher', function() {
	return course_ins()->addTeacher();
});

Route::any('/api/course/readTeacher', function() {
	return course_ins()->readTeacher();
});

Route::any('/api/course/addClassroom', function() {
	return course_ins()->addClassroom();
});

Route::any('/api/course/readClassroom', function() {
	return course_ins()->readClassroom();
});

Route::any('/api/homework/add', function() {
	return homework_ins()->add();
});

Route::any('/api/homework/read', function() {
	return homework_ins()->read();
});

Route::any('/api/homework/remove', function() {
	return homework_ins()->remove();
});

Route::any('/api/homework/change', function() {
	return homework_ins()->change();
});

Route::any('/api/homework/count', function() {
	return homework_ins()->count();
});

/*模板文件位置定义*/
Route::any('tpl/page/home', function()
{
	return view('page.home');
});

Route::any('tpl/page/admin', function()
{
	return view('page.admin');
});

Route::any('tpl/page/course_all', function()
{
	return view('page.course_all');
});

Route::any('tpl/page/course_add', function()
{
	return view('page.course_add');
});

Route::any('tpl/page/class_all', function()
{
	return view('page.class_all');
});

Route::any('tpl/page/class_add', function()
{
	return view('page.class_add');
});

Route::any('tpl/page/teacher_all', function()
{
	return view('page.teacher_all');
});

Route::any('tpl/page/teacher_add', function()
{
	return view('page.teacher_add');
});

Route::any('tpl/page/classroom_all', function()
{
	return view('page.classroom_all');
});

Route::any('tpl/page/classroom_add', function()
{
	return view('page.classroom_add');
});

Route::any('tpl/page/homework_all', function()
{
	return view('page.homework_all');
});

Route::any('tpl/page/homework_add', function()
{
	return view('page.homework_add');
});