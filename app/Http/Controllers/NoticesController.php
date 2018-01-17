<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/17
 * Time: 16:29
 */

namespace App\Http\Controllers;


class NoticesController extends Controller
{
    public function index()
    {
        return view('notices/index');
    }
}