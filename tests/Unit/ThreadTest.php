<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
       parent::setUp();
       $this->thread = factory('App\Thread')->create();
    }

   /** @test */
   public function a_thread_has_replies()
   {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
   }

   /** @test */
   public function a_thread_belong_to_a_user()
   {
        $this->assertInstanceOf('App\User', $this->thread->owner);
   }

   /** @test */
   public function a_thread_can_add_a_reply() {
    $this->thread->addReply([
      'user_id' => 1,
      'body' => 'Test reply'
    ]);
    $this->assertCount(1, $this->thread->replies);
   }
}
