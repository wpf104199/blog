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
}