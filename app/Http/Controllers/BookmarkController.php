<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    //ブックマーク追加
    public function store($postId){
        $user =Auth::user();
        if (!$user->is_bookmark($postId)){
            $user->bookmark_posts()->attach($postId);
        }
        return back();
    }

    public function destroy($postId){
        $user =Auth::user();
        if ($user->is_bookmark($postId)){
            $user->bookmark_posts()->detach($postId);
        }
        return back();
    }
    
}
