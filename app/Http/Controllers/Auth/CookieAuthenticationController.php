<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CookieAuthenticationController extends Controller
{
    // ログイン済ユーザーは、手動でログアウトするまで認証されたままにする
    // これは後回しでよい！
    public function loggedIn(Request $request)
    {
        // $remember = $request->remember_me;
        // if (!Auth::attempt($request->only('name', 'email', 'password'), $remember)) {
        //     return redirect('/login');
        // };
        // if ($remember) {
        //     $remember_cookie_name = Auth::getRecallerName();
        //     Cookie::queue(
        //         $name = $remember_cookie_name,
        //         $value = Cookie::queued($remember_cookie_name)->getValue(),
        //         $minutes = 10080, // 7日
        //         $path = '/',
        //         $domain = null
        //     );
        // }
        // return redirect('/main');
    }
    
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
            // return new JsonResponse(['message' => 'ログインしました']);
            return redirect('/status');
        }

        // 認証が失敗した場合の処理
        // ・前の画面にリダイレクトする
        // ・エラーメッセージを送る
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        return response()->json(['message' => 'ログインに失敗しました。再度お試しください'],401);
        // 使えるか後で確認する
        // throw ValidationException::withMessages(['email' => 'メールアドレスかパスワードが間違っています']);
    }

    public function logout(Request $request)
    {
        // dd($request);

        // ログインのセッションを無効とする
        Auth::logout();

        // セッションをクリア＆セッションIDを再発行
        $request->session()->invalidate();
    
        // csrfトークンの再生成 
        // 二重送信対策
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}




