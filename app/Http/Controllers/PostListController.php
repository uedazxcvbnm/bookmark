<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostListController extends Controller
{
    function show(){
        $posts = Post::all();
        
        return view("home",["posts" => $posts]);
    }
}
