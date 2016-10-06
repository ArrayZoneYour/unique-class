<?php

namespace UniqueClass;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function read() {
        /*检查用户是否登录*/
        if(!Auth::check())
            return err('您还没有登录!');
        /*检查参数中是否有用户ID*/
        if(!rq('id')) {
            return err('需要用户ID');
        }
        $user = user_ins()
            ->with('class')
            ->find(rq('id'));
        return suc($user);
    }

    public function change() {
        if(!rq('class_id'))
            return err('需要班级ID');
        Auth::user()->class_id = rq('class_id');
        return Auth::user()->save() ?
            suc(null, '更新成功！') :
            err('更新失败');
    }

    public function class() {
        return $this->belongsTo('UniqueClass\Eclass');
    }
}
