<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PoemWasUpdated;
use app\Poem;

 class PoemTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
   public  function it_has_an_creator()
    {
        $poem = create('App\Poem');
        $this->assertInstanceOf('App\User',$poem->creator);
    }

     /** @test */
     function it_has_an_reply()
    {
        $poem = create('App\Poem');

         $poem->addReply([
           'body' => 'add new reply',
           'user_id'=> 1
       ]);
        $this->assertCount(1,$poem->replies);
    }
     /** @test */
     function a_poem_belongs_to_channel()
    {
        $poem = create('App\Poem');    
       
        $this->assertInstanceOf('App\Channel',$poem->channel);
    }
/** @test */
    function a_poem_has_a_path()
    {
        $poem = create("App\Poem");
        $this->assertEquals("/poems/{$poem->channel->slug}/{$poem->slug}",$poem->path());
      
    }


    /** @test */
    function a_poem_can_be_subsecribed_to(){
        $poem= create("App\Poem");

       
        $poem->subscribe($userId = 1);

        $this->assertEquals(1,$poem->subscriptions()->where('user_id',$userId)->count());


    }
        /** @test */
        function a_poem_can_be_Unsubsecribed_to(){
            $poem= create("App\Poem");
    
           
            $poem->subscribe($userId = 1);
            $this->assertEquals(1,$poem->subscriptions()->where('user_id',$userId)->count());

            $poem->unSubscribe($userId = 1);


    
            $this->assertEquals(0,$poem->subscriptions()->where('user_id',$userId)->count());
    
    
        }
        /** @test */
        function is_know_if_the_user_subscribed_to(){
            $poem= create("App\Poem");
    
           $this->signIn();
            $poem->subscribe();
            $this->assertTrue($poem->isSubscribedTo);

            $poem->unSubscribe();

            $this->assertFalse($poem->isSubscribedTo);
    

    
    
        }
/** @test */
  function all_subscriber_will_be_notifited_when_a_reply_has_been_lefted(){
      Notification::fake();
      $this->poem = create('App\Poem');
      $this->signIn()->poem->subscribe()
      ->addReply([
        'body' => 'add new reply',
        'user_id'=> 1
    ]);

    Notification::assertSentTo(auth()->user(),PoemWasUpdated::class);

  }

  /** @test */
  function a_poem_can_check_if_signIn_user_read_all_replies(){
    
    
    $this->signIn();
    $poem = create('App\Poem');
    tap(auth()->user(), function($user) use ($poem){
        $this->assertTrue($poem->hasUpdatesFor($user));

    $user->read($poem);
        $this->assertFalse($poem->hasUpdatesFor($user));

        



    });
    

}
  
    /** @test */
    function a_poem_may_be_locked()
    {
        $this->poem = create('App\Poem');
        $this->assertFalse($this->poem->locked);
        $this->poem->lock();
        $this->assertTrue($this->poem->locked);
    }
   
}