<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        // 対象レコード取得
        $user = User::find($id);
        // リクエストデータ受取
        $form = $request->all();
        // フォームトークン削除
        unset($form['_token']);
        // レコードアップデート
        $user->fill($form)->save();
        return redirect('/profile/{user}');
    }
}
