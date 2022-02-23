<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        // トップページ「/」に対してgetリクエストをする
        $response = $this->get('/');

        // その結果に対して、ステータスコード200が返ってくるか確認
        $response->assertStatus(200);
    }
}