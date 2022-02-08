<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CookieAuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 認証が成功した場合の処理
        if (Auth::attempt($credentials)) {
            // セッションIDの再生成
            $request->session()->regenerate();
            // ログイン後、「dashboard」?? へページ遷移する
            // return redirect()->intended('dashboard');
            // return response()->json(['message' => 'ログインしました'], 200);
            return new JsonResponse(['message' => 'ログインしました']);
        }

        // 認証が失敗した場合の処理
        // ・前の画面にリダイレクトする
        // ・エラーメッセージを送る
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        // return response()->json(['message' => 'ログインに失敗しました。再度お試しください']);
        // 例外を投げる
        throw new Exception('ログインに失敗しました。再度お試しください');
    }

    // 今後つくりたいな
    public function logout(Request $request)
    {
        //
    }
}
