<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
     function it_has_an_owner()
    {
        $reply = create('App\Reply');
        $this->assertInstanceOf('App\User',$reply->owner);
    }

     /** @test */
      function a_replie_has_a_body()
     {
        $this->expectException('Illuminate\Validation\ValidationException');
         //given we have an_authenticated_user
         $this->signIn();
         //Add existing Poem
         $poem= create('App\Poem');
         //make a reply
         $reply = make('App\Reply',['body'=>null]);
         //create the url and pass the reply to it 
        
         $this->post($poem->path().'/replies',$reply->toArray());
 
         //make sure we see the reply in poem page
         $this->get($poem->path())  
         ->assertSessionHasErrors('body');   
    
    
 
     }
   
}
