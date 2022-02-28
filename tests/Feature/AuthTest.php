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
        // $this->user = User::create([
        //     'name' => 'sample_user',
        //     'email' => 'aaa@bbb.net',
        //     'password' => Hash::make('abcd1234'),
        // ]);
        $this->user = User::factory()->create();
    }

    /** @test login*/
    public function 正しいパスワードの場合()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // actingAs:指定ユーザーを現在のユーザーとして認証する
        $response = $this->actingAs($this->user)->get('/');

        // ログインする
        // $response = $this->post('/api/login', ['email' => $this->user->email, 'password' => 'abcd1234']);
    
        // このユーザーがログイン認証されているか
        $this->assertAuthenticatedAs($this->user);
    }

    /** @test login*/
    public function 間違ったパスワードの場合()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        // パスワードが正しく無い状態でログイン
        $response = $this->post('/login', ['email' => $this->user->email, 'password' => 'Test123']);
        // 失敗しているので認証されていない事
        $this->assertGuest();
    }

    /** @test logout*/
    public function ログアウトが正しくできるか()
    {
        // ログイン状態の作成
        $response = $this->actingAs($this->user);
        $response = $this->get('/');
        $response->assertStatus(200);
        // ログアウト処理をする
        $this->get('/api/logout');
        // ログアウト出来たら200番が帰ってきているか
        $response->assertStatus(200);
        // 認証されていないことを確認
        $this->assertGuest();
    }
}
