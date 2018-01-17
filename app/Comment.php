<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/16
 * Time: 18:33
 */

namespace App;


class Comment extends BaseModel
{
    public function post()
    {
        return $this->belongsTo('\App\Post','post_id','id');
    }
    public function user()
    {
        return $this->belongsTo('\App\User','user_id','id');
    }
}