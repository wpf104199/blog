<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/17
 * Time: 17:44
 */

namespace App;


class Fan extends BaseModel
{
    function fuser()
    {
        return $this->hasOne('\App\User','fans_id','id');
    }
    function suser()
    {
        return $this->hasOne('\App\User','start_id','id');
    }
}