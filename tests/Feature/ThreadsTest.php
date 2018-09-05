<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\

class Threads extends TestCase
{

    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_view_all_threads()
    {

        $thread = factory('App\Thread')->create();

        $response = $this->get('threads');
        $response->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_read_a_single_thread()
    {
    	$thread = factory('App\Thread')->create();

    	$response = $this->get($thread->path());
    	$response->assertSee($thread->title);

    }

}
