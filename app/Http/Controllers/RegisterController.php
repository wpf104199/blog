<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 12:55
 */

namespace App\Http\Controllers;


use App\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register/index');
    }

    public function register()
    {
        $this->validate(request(),[
           'name' => 'required|max:10|min:3|unique:users,name',
            'email' => 'required|max:20|min:5|unique:users,email|email',
            'password' => 'required|max:20|min:3|confirmed'
        ]);
        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
        User::create(compact('name','email','password'));
        return redirect('/login');
    }
}