<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 12:56
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(\App\User $user)
    {
        $posts = $user->posts;
        return view('user/index',compact('posts'));
    }

    public function setting()
    {
        $user = \Auth::user();
        return view('user/setting',compact('user'));
    }

    public function settingStore(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required|min:3|max:15'
        ]);
        $user = \Auth::user();
        $name = request('name');
        if($user->name != $name)
        {
            if(User::where('name',$name)->count() > 0)
            {
                return back()->withErrors('用户名已存在');
            }
            $user->name = $name;
        }
        if($request->file('avatar'))
        {
            $path = $request->file('avatar')->storePublicly('public');
            $path = explode('/',$path);
            $user->avatar = '/storage/'.$path[1];
        }
        $user->save();
        return back();
    }
}