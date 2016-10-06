<?php

namespace UniqueClass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Teacher extends Model
{
    public function add() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在老师全称及简称*/
		if(!rq('name'))
			return err('需要老师姓名');
		/*检查该班级是否已经存在*/
		$teacher = teacher_ins()->where('name', rq('name'))->first();
		if($teacher) {
			return err('该老师已经存在！');
		}
		/*写入班级信息*/
		$this->name = rq('name');
		$this->email = rq('email');
		$this->phone = rq('phone');
		$this->intro = rq('intro');

		return $this->save() ?
			suc(['id' => $this->id], '老师信息添加成功！') :
			err('老师信息添加失败！');
    }

    public function read() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在老师全称及简称*/
		if(!rq('id')) {
			$teacher = teacher_ins()->get();
		} else {
			/*检查查询的老师是否存在*/
			$teacher = teacher_ins()->find(rq('id'));
		}

		
		if(!$teacher)
			return err('查询的老师不存在');
		$data = $teacher->toArray();
		return suc($data);
    }

    public function remove() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在老师的ID*/
		if(!rq('id'))
			return err('需要老师ID');
		/*检查要删除的老师是否存在*/
		$teacher = teacher_ins()->find(rq('id'));
		if(!$teacher)
			return err('要删除的老师信息不存在');
		$r = $teacher->delete();
		if(!$r)
			return err('删除失败');
		return suc(null, '删除成功！');
    }

    public function change() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在老师ID、全称及简称*/
		if(!rq('id'))
			return err('需要教师ID');
		/*检查要删除的老师是否存在*/
		$teacher = teacher_ins()->find(rq('id'));
		if(!$teacher)
			return err('要修改的老师不存在');
		if(rq('name'))
			$teacher->name = rq('name');
		if(rq('email'))
			$teacher->email = rq('email');
		if(rq('phone'))
			$teacher->phone = rq('phone');
		if(rq('intro'))
			$teacher->intro = rq('intro');
		return $teacher->save() ?
			suc(['id' => $teacher->id], '更新成功') :
			err('更新失败');
    }

    public function count() {
    	$num = teacher_ins()->get()->count();
    	return $num ? suc(['num' => $num]) : err('获取失败');
    }
}
