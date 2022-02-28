<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{

    // 各テストの後にデータベースをリセット
    use RefreshDatabase;

    // テストクラスに独自のsetUpメソッドを定義する
    protected function setUp(): void
    {
        // 親クラスのsetUpメソッドの呼び出し
        parent::setUp();

        // テストユーザ作成＆DBに保存
        $this->user = User::create([
            'name' => 'sample_user',
            'email' => 'aaa@bbb.net',
            'password' => Hash::make('abcd1234'),
        ]);

    }

    /** @test index*/
    // public function ログイン画面を開ける()
    // {
    //     $this->get('/')
    //         ->assertOk();
    // }

    /** @test index*/
    public function 正しいパスワードの場合()
    {   
        $response = $this->get('/');
        $response->assertStatus(200);

        // dump($this->user);

        // ログインする
        // $response = $this->post('/', ['email' => $this->user->email, 'password' => 'abcd1234']);
        $response = $this->post('/', ['email' => 'aaa@bbb.net', 'password' => 'abcd1234']);
    
        // このユーザーがログイン認証されているか
        // FAIL
        // $this->userの中を確認した感じ大丈夫そうだが…？
        $this->assertAuthenticatedAs($this->user);

    }
}
