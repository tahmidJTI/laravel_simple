<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index(){

        $posts = Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }


    public function show(Post $post){

        return view('blog-post',['post'=>$post]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(){

        $inputs = request()->validate([
            'title'=>'required',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if (request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('create','Post was created');

        return redirect()->route('post.index');

    }

    public function destroy(Post $post){

            $this->authorize('delete',$post);

            $post->delete();
            session()->flash('message','Post Was deleted');
            return back();

    }

    public function edit(Post $post){
        return view('admin.posts.update',['post'=>$post]);
    }

    public function update(Post $post){

        $inputs = request()->validate([
            'title'=>'required',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        $this->authorize('update',$post);

        if (request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        $post->update($inputs);
        session()->flash('create','Post is successfully updated');
        return redirect()->route('post.index');
    }

    public function clear(){
        $posts = Post::all();
        return view('clear',compact('posts'));
    }

}
