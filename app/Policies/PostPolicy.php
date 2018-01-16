<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 19:44
 */

namespace App\Policies;

use \App\Post;
use \App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }
    public function update(User $user,Post $post)
    {
        return $user->id == $post->user_id;
    }
    public function delete(User $user ,Post $post)
    {
        return $user->id == $post->user_id;
    }
}