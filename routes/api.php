<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Laravel8から、使うコントローラのuseが必要
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookInformationController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\Auth\CookieAuthenticationController;
use App\Http\Controllers\Auth\RegisterController;

// 受信リクエストがSPAからのステートフル認証済みリクエストとして認証されるか、
// リクエストがサードパーティからのものである場合は有効なAPIトークンヘッダを含むことを保証する
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Laravel8から書き方が変更された!
// apiに対応したrestfulにしておく
// VueRouter
Route::apiResource('/books', BookController::class);
Route::apiResource('/book_information', BookInformationController::class);
Route::apiResource('/rentals', RentalController::class);
// 手動
Route::post('/login', [CookieAuthenticationController::class, 'login']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [CookieAuthenticationController::class, 'logout']);



// 認証済みでないと許可しない
Route::group(["middleware" => ["auth:sanctum"]], function () {
    // 貸出処理
    Route::apiResource('/api/rentals', RentalController::class);
});
