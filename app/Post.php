<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 23:52
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    public function user()
    {
        return $this->belongsTo('\App\User','user_id','id');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment','post_id','id')->orderBy('created_at','desc');
    }

    public function zan($user_id)
    {
        return $this->hasOne('\App\Zan','post_id','id')->where('user_id',$user_id);
    }
    public function zans()
    {
        return $this->hasMany('\App\Zan','post_id','id');
    }

}