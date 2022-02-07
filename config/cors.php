<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    // CORSヘッダーを出力するパスのパターン、任意でワイルドカード(*)が利用できる。
    'paths' => [
        //api全般を対象にする
        'api/*',
        'login',
        'logout',
        'sanctum/csrf-cookie'
    ],

    // マッチするHTTPメソッドをかく
    // 今回は全てのリクエストにマッチするようにしている
    'allowed_methods' => ['*'],

    // 許可するリクエストオリジンの設定
    'allowed_origins' => ['*'],

    // 正規表現によるオリジン指定。preg_matchの引数としてそのまま渡される。
    'allowed_origins_patterns' => [],

    // Access-Control-Allow-Headers response header
    // レスポンスヘッダーの指定
    'allowed_headers' => ['*'],

    // Access-Control-Expose-Headers
    // レスポンスヘッダーの指定
    'exposed_headers' => [],

    // Access-Control-Max-Age
    // レスポンスヘッダーの指定
    'max_age' => 0,

    // Access-Control-Allow-Credentials
    // ヘッダーを設定する。
    'supports_credentials' => true,

];
