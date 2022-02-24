<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
        // $this->withoutExceptionHandling();

        $postData = [
            'email' => 'aaa@bbb.net',
            'password' => 'abcd1234',
        ];

        $dbData = [
            'email' => 'aaa@bbb.net',
            'password' => bcrypt('abcd1234'),
        ];

        $user = User::factory()->create($dbData);

        $this->post('/',$postData)
            ->assertRedirect('/');

        $this->assertAuthenticatedAs($user);
    }
}
