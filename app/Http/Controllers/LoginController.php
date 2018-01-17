<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 12:55
 */

namespace App\Http\Controllers;


class LoginController extends Controller
{
    public function index()
    {
        if(\Auth::check())
        {
            return redirect('/posts');
        }
        return view('login/index');
    }
    public function login()
    {
        $this->validate(request(),[
            'email' => 'required|max:20|min:5|email',
            'password' => 'required|max:20|min:3',
            'is_remember' => 'integer',
        ]);
        $user = request(['email','password']);
        $is_remember = boolval(request('is_remember'));
        if(\Auth::attempt($user,$is_remember))
        {
            return redirect('/posts');
        }
        return \Redirect::back()->withErrors('邮箱密码不匹配');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/posts');
    }
}