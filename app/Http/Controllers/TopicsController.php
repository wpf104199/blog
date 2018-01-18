<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/18
 * Time: 18:49
 */

namespace App\Http\Controllers;


class TopicsController extends Controller
{
    public function show(\App\Topic $topic)
    {
        return view('topics/view',compact('topic'));
    }
    public function submit()
    {
        return;
    }
}