<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
    function a_poem_can_make_a_string_path()
    {
        $poem = create("App\Poem");
        $this->assertEquals("/poems/{$poem->channel->slug}/{$poem->id}",$poem->path());
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

  
    
   
}