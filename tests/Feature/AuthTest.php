<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class AuthTest extends TestCase
{
    // 各テストの後にデータベースをリセット
    use RefreshDatabase;

    /** @test index*/ 
    function ログイン画面を開ける(){
        $this->get('/')
            ->assertOk();
    }

    /** @test login*/
    function ログインできる(){
        // Laravel8.51～不要
        // $this->withoutExceptionHandling();

        // POST送信するデータを用意
        $postData = [
            'email' => 'aaa@bbb.net',
            'password' => 'abcd1234',
        ];

        // dump($postData);

        // DBに保存するデータを用意
        $dbData = [
            'email' => 'aaa@bbb.net',
            // パスワードハッシュ化、これでもできるかみてみる
            'password' => bcrypt('abcd1234'),
        ];
        
        // dump($dbData);

        // DBにデータを保存する
        $user = User::factory()->create($dbData);

        // dump($user);

        // ログインページにpostDataを送信した場合に「貸出状況」ページにリダイレクトできているか
        $this->post('/',$postData)
            ->assertRedirect('/status');

        // 指定したユーザーが認証されているか
        $this->assertAuthenticatedAs($user);
    }
}
