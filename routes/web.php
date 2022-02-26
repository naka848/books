<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// どこにアクセスしても、同じところ（Vueが連携してるwelcome.blade.php）にいく
Route::get('/{any}', function () {
    return view('welcome');
// {any}に入るルートパラメータのフォーマットを指定
// 今回は正規表現で全ての文字列を表している
})->where('any','.*');
