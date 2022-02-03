<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // dd($request);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // dd($credentials);
        // dd(Auth::attempt($credentials));

        // 認証が成功した場合の処理
        if (Auth::attempt($credentials)) {
            // セッションIDの再生成
            $request->session()->regenerate();
            // ログイン後、「dashboard」?? へページ遷移する
            // return redirect()->intended('dashboard');
            return response()->json(['message' => 'Login successful'], 200);
        }

        // 認証が失敗した場合の処理
        // ・前の画面にリダイレクトする
        // ・エラーメッセージを送る
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        return response()->json(['message' => 'Login failure！']);
    }
}