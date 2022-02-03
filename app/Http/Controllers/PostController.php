<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function show (){
        return view("post_form");
    }

    function upload(Request $request){
        // フォームに入力される情報
        $name = $request->input('name');
        $contents = $request->input('contents');
        //ログインしているユーザーIDを取得
        $user_id = Auth::user()->id;

        Post::insert(
            [
            "user_id" => $user_id,
            "name" => $name,
            "contents" => $contents,
            ]);
        return redirect('/home');
    }
    //ここから下がブックマーク機能として追加した場所
    public function bookmark_posts(){
        //$posts=Auth::user()->bookmark_posts()->orderby('created_at','desc')->paginate(10);
        $posts=Auth::user()->bookmark_posts()->orderby('created_at','desc')->get();
        $data=[
            'posts'=>$posts,
        ];
        return view('bookmarks',$data);
    }
    public function index(){
        //$posts=Post::orderby('created_at','desc')->paginate(10);
        $posts=Post::orderby('created_at','desc')->get();
        $data=['posts'=> $posts];
        //return view('posts.index',$data);
        return view('posts',$data);
    }
    
}
