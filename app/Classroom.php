<?php

namespace UniqueClass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Classroom extends Model
{
    public function add() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在教室全称及简称*/
		if(!rq('name'))
			return err('需要教室名');
		/*检查该班级是否已经存在*/
		$classroom = classroom_ins()->where('name', rq('name'))->first();
		if($classroom) {
			return err('该教室信息已经存在！');
		}
		/*写入班级信息*/
		$this->name = rq('name');

		return $this->save() ?
			suc(['id' => $this->id], '教室信息添加成功！') :
			err('教室信息添加失败！');
    }

    public function read() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在教室全称及简称*/
		if(!rq('id')) {
			$classroom = classroom_ins()->get();
		} else {
			/*检查查询的教室是否存在*/
			$classroom = classroom_ins()->find(rq('id'));
		}
		
		if(!$classroom)
			return err('查询的教室不存在');
		$data = $classroom->toArray();
		return suc($data);
    }

    public function remove() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在教室的ID*/
		if(!rq('id'))
			return err('需要教室ID');
		/*检查要删除的教室是否存在*/
		$classroom = classroom_ins()->find(rq('id'));
		if(!$classroom)
			return err('要删除的教室信息不存在');
		$r = $classroom->delete();
		if(!$r)
			return err('删除失败');
		return suc(null, '删除成功！');
    }

    public function count() {
    	$num = classroom_ins()->get()->count();
    	return $num ? suc(['num' => $num]) : err('获取失败');
    }
}
