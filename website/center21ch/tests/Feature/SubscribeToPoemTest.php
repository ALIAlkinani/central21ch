<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscribeToPoemTest extends TestCase
{
    /** @test */
public function a_user_can_subscribe_to_poem()
{
    $this->signIn();
    //given we have a poem
    $poem = create("App\Poem");
   //when a user subscribe to poem
    $this->post($poem->path() . '/subscriptions');

    // when a new reply lefted
    $poem->addReply([
        'user_id'=>auth()->id(),
        'body'=>"some text body"

    ]);


// the user will get notifications
    $this->assertCount(1,$poem->subscriptions);
    
}
 /** @test */
 public function a_user_can_Unsubscribe_to_poem()
 {
     $this->signIn();
     //given we have a poem
     $poem = create("App\Poem");
    //when a user subscribe to poem
     $this->delete($poem->path() . '/subscriptions');
 
 
 // the user will get notifications
     $this->assertCount(0,$poem->subscriptions);
     
 }
}
