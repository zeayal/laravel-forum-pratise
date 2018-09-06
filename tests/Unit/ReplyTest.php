<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_reply_belong_to_a_thread()
    {
        $reply = factory('App\Reply')->create();
        $this->assertInstanceOf('App\Thread', $reply->thread);
    }

    /** @test */
    public function a_reply_belong_to_a_User()
    {
        $reply = factory('App\Reply')->create();
        $this->assertInstanceOf('App\User', $reply->owner);
    }
}
