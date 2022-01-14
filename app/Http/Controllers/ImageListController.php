<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadImage;
use App\Models\Post;

class ImageListController extends Controller
{
    function show(){
		//アップロードした画像を取得
		$uploads = UploadImage::orderBy("id", "desc")->get();
		$posts = Post::orderBy("id", "desc")->get();

		return view("home",[
			"images" => $uploads,
			"posts" => $posts
		]);
	}
}
