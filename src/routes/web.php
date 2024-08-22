<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
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
    return view('index'); // ホームページのビュー
});

// お問い合わせページ
Route::get('/contact', function () {
    return view('contact.index'); // お問い合わせページのビュー
});

// お問い合わせ内容確認ページ
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

// お問い合わせ内容送信処理
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// お問い合わせ送信後のサンキューページ
Route::get('/thanks', function () {
    return view('thanks'); // 送信完了ページのビュー
});

// ログインページ
Route::get('/login', function () {
    return view('login'); // ログインページのビュー
});

// ログインフォームの表示
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// ログイン処理
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// ログイン処理確認ページ
Route::post('/login/confirm', [LoginController::class, 'confirm'])->name('login.confirm');

// ログアウト処理
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
