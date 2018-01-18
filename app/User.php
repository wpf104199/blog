<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 16:30
 */

namespace App;



use Illuminate\Foundation\Auth\User as Authenticatble;

class User extends Authenticatble
{
    protected $fillable = ['name','email','password','remember_token'];

    public function posts()
    {
        return $this->hasMany('\App\Post','user_id','id');
    }
    // 我关注的用户
    public function starts()
    {
        return $this->hasMany('\App\Fan','fans_id','id');
    }
    // 我的粉丝用户
    public function fans()
    {
        return $this->hasMany('\App\Fan','start_id','id');
    }

    // 增加对某个用户的关注
    public function doFan($uid)
    {
        $fans = new \App\Fan();
        $fans->start_id = $uid;
        return $this->starts()->save($fans);
    }
    // 取消对某个用户的关注
    public function doUnfan($uid)
    {
        $fans = new \App\Fan();
        $fans->start_id = $uid;
       return $this->starts()->delete($fans);
    }

    // 我是否被某个用户关注
    public function hasFans($uid)
    {
        return $this->fans()->where('fans_id',$uid)->count();
    }

    // 我是否已经关注某个用户
    public function hasStar($uid)
    {
        return $this->starts()->where('start_id',$uid)->count();
    }

}