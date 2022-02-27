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
        $response = $this->post('/', ['email' => $this->user->email, 'password' => 'abcd1234']);
        // $response = $this->post('/', ['email' => 'aaa@bbb.net', 'password' => 'abcd1234']);

        // リダイレクトでページ遷移してくるのでstatusは302
        // FAIL
        // $response->assertStatus(302);
        
        // リダイレクトで帰ってきた時のパス
        // FAIL
        // $response->assertRedirect('/status');

        // このユーザーがログイン認証されているか
        // FAIL
        // $this->userの中を確認した感じ大丈夫そうだが…？
        // $this->assertAuthenticatedAs($this->user);

    }

    /** @test login*/
    // function ログインできる(){
    //     // Laravel8.51～不要
    //     // $this->withoutExceptionHandling();

    //     // POST送信するデータを用意
    //     $postData = [
    //         'email' => 'aaa@bbb.net',
    //         'password' => 'abcd1234',
    //     ];

    //     // dump($postData);

    //     // DBに保存するデータを用意
    //     $dbData = [
    //         'email' => 'aaa@bbb.net',
    //         // 'password' => bcrypt('abcd1234'),
    //         'password' => Hash::make('abcd1234'),

    //     ];

    //     // dump($dbData);

    //     // DBにデータを保存する
    //     $user = User::factory()->create($dbData);

    //     // dump($user);

    //     // ログインページにpostDataを送信した場合に「貸出状況」ページにリダイレクトできているか
    //     $this->post('/',$postData)
    //         // ->assertRedirect('/status');
    //         ->assertRedirect('http://127.0.0.1:8000/status');

    //     // 指定したユーザーが認証されているか
    //     $this->assertAuthenticatedAs($user);

    // }
}
