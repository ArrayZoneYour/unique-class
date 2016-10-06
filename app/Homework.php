<?php

namespace UniqueClass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Homework extends Model
{
    public function add() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在作业全称及简称*/
		if(!rq('course_id') ||
			!rq('deadline') ||
			!rq('content'))
			return err('需要课程ID、班级ID、截止日期和作业内容');
		/*写入作业信息*/
		$this->course_id = rq('course_id');
		$this->deadline = substr((rq('deadline')), 0, 10);
		$this->content = rq('content');
		$this->enable = true;

		return $this->save() ?
			suc(['id' => $this->id], '作业信息添加成功！') :
			err('作业信息添加失败！');
    }

    public function read() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在作业ID*/
		if(!rq('id')) {
			$homework = homework_ins()->where([
			['enable', true],
			])
			->with('course')
			->get();
		} else {
		/*检查查询的作业是否存在*/
		$homework = homework_ins()->where([
			['enable', true],
			['id', rq('id')],
			])->get(['id', 'content', 'deadline', 'created_at', 'updated_at']);
		}
		if(!$homework)
			return err('查询的作业不存在');
		$data = $homework->toArray();
		return suc($data);
    }

    public function remove() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在作业的ID*/
		if(!rq('id'))
			return err('需要作业ID');
		/*检查要删除的作业是否存在*/
		$homework = homework_ins()->find(rq('id'));
		if(!$homework)
			return err('要删除的作业信息不存在');
		$homework->enable = false;
		return $homework->save() ?
			suc(['id' => $homework->id], '删除成功') :
			err('删除失败');
    }

    public function change() {
    	/*检查用户是否登录*/
    	if(!Auth::check())
    		return err('您还没有登录!');
    	/*检查参数中是否存在作业ID、全称及简称*/
		if(!rq('id') || !rq('content'))
			return err('需要作业ID和作业内容');
		/*检查要删除的作业是否存在*/
		$homework = homework_ins()->find(rq('id'));
		if(!$homework)
			return err('要修改的作业不存在');
		$homework->content = rq('content');
		return $homework->save() ?
			suc(['id' => $homework->id], '更新成功') :
			err('更新失败');
    }

    public function count() {
    	$num = homework_ins()->get()->count();
    	return $num ? suc(['num' => $num]) : err('获取失败');
    }

    public function course() {
    	return $this->belongsTo('UniqueClass\Course');
    }
}
