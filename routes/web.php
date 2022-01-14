<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

# layout部分

use App\Http\Controllers\LayoutController;
Route::get('/layout', [LayoutController::class, 'index']);
Route::get('/layout/users', [LayoutController::class, 'users']);
Route::get('/layout/posts', [LayoutController::class, 'posts']);
Route::get('/layout/comments', [LayoutController::class, 'comments']);

# auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\ImageListController::class, "show"])->name("image_list");

// プロフィール
Route::get('/profile', [ProfileController::class, 'index'])->name('profile_show');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/form', [App\Http\Controllers\UploadImageController::class, "show"])->name("upload_form");
	Route::post('/upload', [App\Http\Controllers\UploadImageController::class, "upload"])->name("upload_image");

	Route::get('/post_form', [App\Http\Controllers\PostController::class, "show"])->name("post_form");
	Route::post('/post_form', [App\Http\Controllers\PostController::class, "upload"])->name("post_upload");

	// 編集画面
	Route::get('/edit', [ProfileController::class, 'edit'])->name('profile_edit');
	//プロフィール編集
	Route::put('/profile', [ProfileController::class, 'update'])->name('profile_update');
});