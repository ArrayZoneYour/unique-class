<?php

namespace UniqueClass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Eclass extends Model
{

    public function add() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在班级全称及简称*/
		if(!rq('name') || !rq('shortname'))
			return err('班级名及简称必须填写完毕');
		/*检查该班级是否已经存在*/
		$class = class_ins()->where('name', rq('name'))->first();
		if($class) {
			return err('该班级已经存在！');
		}
		/*写入班级信息*/
		$this->name = rq('name');
		$this->short_name = rq('shortname');

		return $this->save() ?
			suc(['id' => $this->id], '班级创建成功！') :
			err('班级创建失败！');
    }

    public function read() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在班级全称及简称*/
		if(!rq('id')){
			$class = class_ins()->get();
		} else {
			/*检查查询的班级是否存在*/
			$class = class_ins()->find(rq('id'));
		}
		if(!$class)
			return err('查询的班级不存在');
		$data = $class->toArray();
		return suc($data);
    }

    public function remove() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在班级全称及简称*/
		if(!rq('id'))
			return err('需要班级ID');
		/*检查要删除的班级是否存在*/
		$class = class_ins()->find(rq('id'));
		if(!$class)
			return err('要删除的班级不存在');
		$r = $class->delete();
		if(!$r)
			return err('删除失败');
		return suc(null, '删除成功！');
    }

    public function change() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在班级ID、全称及简称*/
		if(!rq('id'))
			return err('需要班级ID');
		if(!rq('name') && !rq('shortname'))
			return err('需要修改后的班级简称或班级全称');
		/*检查要删除的班级是否存在*/
		$class = class_ins()->find(rq('id'));
		if(!$class)
			return err('要修改的班级不存在');
		if(rq('name'))
			$class->name = rq('name');
		if(rq('shortname'))
			$class->short_name = rq('shortname');
		return $class->save() ?
			suc(['id' => $class->id], '更新成功') :
			err('更新失败');
    }

    public function addCourse() {
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在班级ID和课程ID*/
		if(!rq('class_id') || !rq('course_id'))
			return err('需要班级ID和课程ID');
		$insert = class_course_ins();
		$insert->class_id = rq('class_id');
		$insert->course_id = rq('course_id');
		if($insert->first())
			return err('此条数据已经存在');
		return $insert->save() ?
			suc(['id' => $insert->id]) :
			err('新建失败！');

    }

    public function readCourse() {
    	if(!Auth::check())
    		return err('您还没有登录!');
    	if(!rq('class_id'))
    		return err('需要班级ID');
    	$courses = class_course_ins()
    		->with('class')
    		->with('course')
    		->where('class_id', rq('class_id'))
    		->get();
    	return suc($courses);
    }

    public function count() {
    	$num = class_ins()->get()->count();
    	return $num ? suc(['num' => $num]) : err('获取失败');
    }

    
}
