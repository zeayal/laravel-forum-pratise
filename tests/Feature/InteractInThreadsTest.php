<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\AuthenticationException;

class InteractInThreadsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_authenticated_user_can_reply_to_thread()
    {
        $user = factory('App\User')->create();
        $this->be($user);

        $thread = factory('App\Thread')->create();
        $reply = factory('App\Reply')->make();

        $this->post($thread->path().'/replies', $reply->toArray());

        $reponse = $this->get($thread->path());

        $reponse->assertSee($reply->body);
    }

    /** @test */
    public function a_unauthenticated_user_can_not_reply_to_thread()
    {
        $this->withoutExceptionHandling();
        $this->expectException(AuthenticationException::class);
        $response = $this->post('threads/1/replies', []);
        
    }
}
