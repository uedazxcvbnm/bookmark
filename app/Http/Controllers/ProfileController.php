<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.show', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit',['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'introduction' => 'required|string|max:255',
            // 'image' => 'required|file|image',
        ]);

        // 対象レコード取得
        $id = $request->user()->id;
        $upload_image = $request->file('image');
        
        // 更新
        $user = User::find($id);
        $user->name = $request->name;
        $user->introduction = $request->introduction;

        // 画像の変更があった場合
        if($upload_image) {
            //アップロードされた画像を保存する
            $path = $upload_image->store('profiles',"public");
            $image_name = basename($path);
            $del_image = $user->profile_image;

            //画像の保存に成功したら画像の名前を保存
            if($path){
                $user->profile_image = $image_name;
                // 元の画像の削除
                if($del_image !== 'default.png') {
                    \Storage::disk('public')->delete('profiles\\'.$del_image);
                }
            }
        }

        // フォームトークン削除
        // unset($form['_token']);
        // モデルに保存
        $user->save();

        return redirect()->route('profile_show');
    }
}
