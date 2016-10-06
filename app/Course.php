<?php

namespace UniqueClass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    public function add() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在课程全称及简称*/
		if(!rq('name'))
			return err('需要课程名');
		/*检查该课程是否已经存在*/
		$course = course_ins()->where('name', rq('name'))->first();
		if($course) {
			return err('该课程已经存在！');
		}
		/*写入课程信息*/
		$this->name = rq('name');

		return $this->save() ?
			suc(['id' => $this->id], '课程信息添加成功！') :
			err('课程信息添加失败！');
    }

    public function read() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
		/*检查查询的课程是否存在*/
		if(rq('class_id')) {
			$course = course_ins()
				->find(rq('class_id'));
        } else {
            $course = course_ins()->get();
        }

		if(!$course)
			return err('暂无课程');
		$data = $course->toArray();
		return suc($data);
    }

    public function remove() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在课程的ID*/
		if(!rq('id'))
			return err('需要课程ID');
		/*检查要删除的课程是否存在*/
		$course = course_ins()->find(rq('id'));
		if(!$course)
			return err('要删除的课程信息不存在');
		$r = $course->delete();
		if(!$r)
			return err('删除失败');
		return suc(null, '删除成功！');
    }

    public function change() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在课程ID、全称及简称*/
		if(!rq('id'))
			return err('需要课程ID');
		/*检查要删除的课程是否存在*/
		$course = course_ins()->find(rq('id'));
		if(!$course)
			return err('要修改的课程不存在');
		if(rq('name'))
			$course->name = rq('name');
		return $course->save() ?
			suc(['id' => $course->id], '更新成功') :
			err('更新失败');
    }

    public function addTeacher() {
    	if(!Auth::check())
    		return err('您还没有登录!');
    	if(!rq('course_id') || !rq('teacher_id'))
    		return err('需要课程ID和教师ID');
    	$insert = course_teacher_ins();
    	$insert->course_id = rq('course_id');
    	$insert->teacher_id = rq('teacher_id');
    	if($insert->first())
    		return err('此条数据已经存在');
    	return $insert->save() ?
    		suc(['id' => $insert->id]) :
    		err('新建失败！');
    }

    public function readTeacher() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在课程ID、全称及简称*/
		if(!rq('id'))
			return err('需要课程ID');
		$courses = course_teacher_ins()
			->with('course')
			->with('teacher')
			->get();
		return suc($courses);
    }

    public function addClassroom() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在课程ID、教室ID*/
    	if(!rq('course_id') || !rq('classroom_id'))
    		return err('需要教室ID和课程ID');
    	if(!rq('begin_week') || !rq('end_week'))
    		return err('需要起始周次和结束周次');
    	if(!rq('begin_class') || !rq('end_class'))
    		return err('需要上课下课为第几节');
    	if(!rq('weekday'))
    		return err('上课为周几');
    	$insert = classroom_course_ins();
    	$insert->course_id = rq('course_id');
    	$insert->classroom_id = rq('classroom_id');
    	$insert->begin_week = rq('begin_week');
    	$insert->end_week = rq('end_week');
    	$insert->begin_class = rq('begin_class');
    	$insert->end_class = rq('end_class');
    	$insert->weekday = rq('weekday');
    	if($insert->first())
    		return err('此条数据已经存在');
    	return $insert->save() ?
    		suc(['id' => $insert->id]) :
    		err('新建失败');
    }

    public function readClassroom() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在课程ID、全称及简称*/
		if(!rq('id'))
			return err('需要课程ID');
		$classrooms = classroom_course_ins()
			->with('classroom')
			->with('course')
			->get();
		return suc($classrooms);
    }

    public function homework() {
    	return $this->hasMany('UniqueClass\Homework');
    }

    public function count() {
        $num = course_ins()->get()->count();
        return $num ? suc(['num' => $num]) : err('获取失败');
    }
}
