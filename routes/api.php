<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Laravel8から、使うコントローラのuseが必要
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookInformationController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Laravel8から書き方が変更された
// apiに対応したrestfulにしておく
Route::apiResource('/books',BookController::class);
Route::apiResource('/book_information',BookInformationController::class);
