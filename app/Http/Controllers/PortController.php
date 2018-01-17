<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 22:29
 */

namespace App\Http\Controllers;


use App\Comment;
use App\Port;
use App\Post;

class PortController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->withCount('comments')->paginate(2);
        return view('post/index',compact('posts'));
    }

    public function show(\App\Post $post)
    {
        return view('post/show',compact('post'));
    }

    public function edit(\App\Post $post)
    {
        return view('post/edit',compact('post'));
    }

    public function update(\App\Post $post)
    {
        $this->validate(request(),[
            'title' => 'required|string|max:1000|min:3',
            'contents' => 'required|string|max:1000|min:3'
        ]);
        $this->authorize('update',$post);
        $post->title = request('title');
        $post->contents = request('contents');
        $post->save();
        return redirect("/posts/{$post->id}");
    }

    public function create()
    {
        return view('post/create');
    }

    public function add()
    {
        $this->validate(request(),[
            'title' => 'required|string|max:1000|min:3',
            'contents' => 'required|string|max:1000|min:3'
        ]);
        $user_id = \Auth::id();
        $params = array_merge(request(['title','contents']),compact('user_id'));
        Post::create($params);
        return redirect('/posts');
    }

    public function delete(\App\Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect('/posts');
    }

    public function comment(\App\Post $post)
    {
        if(!\Auth::check())
        {
            return back()->withErrors('请先登录');
        }
        $this->validate(request(),[
            'contents' => 'required|min:3'
        ]);
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->contents = request('contents');
        $comment->post_id = $post->id;
        $comment->save();
        return back();
    }
}