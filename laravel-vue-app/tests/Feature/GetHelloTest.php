<?php

namespace Tests\Feature;

use Tests\TestCase;

// ここでは、/api/helloにGETリクエストを送信して、そのレスポンスとしてステータスコードが200であること、
// JSONの内容がmessageキーにHelloという文字列が入っていることを確認しています。
class GetHelloTest extends TestCase
{
    public function testExample()
    {
        $response = $this->get('/api/hello');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Hello World!!',
        ]);
    }
}
