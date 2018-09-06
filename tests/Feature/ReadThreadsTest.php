<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{

    use RefreshDatabase;
    
    public $thread;

    public function setUp()
    {
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $response = $this->get('threads');
        $response->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_a_single_thread()
    {
    	
    	$response = $this->get($this->thread->path());
    	$response->assertSee($this->thread->title);

    }

    /** @test */
    public function a_user_can_read_replies_associative_thread()
    {
         
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);
        $reponse = $this->get($this->thread->path());
        $reponse->assertSee($reply->body);
    }

}
