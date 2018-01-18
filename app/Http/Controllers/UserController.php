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
        $posts = $user->posts()->orderBy('created_at','desc')->take(10)->get();

        $user = User::withCount(['posts','starts','fans'])->find($user->id);
        $starts = $user->starts;
        $suser = User::whereIn('id',$starts->pluck('start_id'))->withCount(['posts','starts','fans'])->get();
        $fans = $user->fans;
        $fuser = User::whereIn('id',$fans->pluck('fans_id'))->withCount(['posts','starts','fans'])->get();
        return view('user/index',compact('posts','user','suser','fuser'));
    }

    public function doFan(\App\User $user)
    {
        $res = \Auth::user()->doFan($user->id);
        if($res)
        {
            return json_encode(['error'=>0]);
        }
        else
        {
            return json_encode(['error'=>1,'msg'=>'error']);
        }
    }
    public function doUnfan(\App\User $user)
    {
        $res = \Auth::user()->doUnfan($user->id);
        if($res)
        {
            return json_encode(['error'=>0]);
        }
        else
        {
            return json_encode(['error'=>1,'msg'=>'error']);
        }
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