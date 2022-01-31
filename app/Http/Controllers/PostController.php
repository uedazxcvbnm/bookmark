<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function show (){
        return view("post_form");
    }

    function upload(Request $request){
        // フォームに入力される情報
        $post = new Post();
        $name = $request->input('name');
        $contents = $request->input('contents');
        //ログインしているユーザーIDを取得
        $user_id = Auth::user()->id;

        // #(ハッシュタグ)で始まる単語を取得。結果は、$matchに多次元配列で代入される。
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->input('tags'), $match);

        // $match[0]に#(ハッシュタグ)あり、$match[1]に#(ハッシュタグ)なしの結果が入ってくるので、$match[1]で#(ハッシュタグ)なしの結果のみを使います。
        $tags = [];
        foreach ($match[1] as $tag){
            $record = Tag::firstOrCreate(['name' => $tag]); // firstOrCreateメソッドで、tags_tableのnameカラムに該当のない$tagは新規登録される。
            array_push($tags, $record); // $recordを配列に追加します(=$tags)
        };

        // 投稿に紐付けされるタグのidを配列化
        $tags_id = [];
        foreach ($tags as $tag) {
            array_push($tags_id, $tag['id']);
        };

        // Post::insert(
        //     [
        //     "user_id" => $user_id,
        //     "name" => $name,
        //     "contents" => $contents,
        //     ]);

        $post->user_id = $user_id;
        $post->name = $name;
        $post->contents = $contents;
        $post->save();

        $post->tags()->attach($tags_id); // 投稿ににタグ付するために、attachメソッドをつかい、モデルを結びつけている中間テーブルにレコードを挿入します。

        return redirect('/home');
    }
}
