<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForumTest extends TestCase
{
    use RefreshDatabase;
        /** @test */
        public function an_unauthenticated_user_cannot_participate_in_forum()
        {


            $this->expectException('Illuminate\Auth\AuthenticationException');
    
           
          
            //Add existing Poem
            $poem= create('App\Poem');
            //make a reply
            $reply = make('App\Reply');
            //create the url and pass the reply to it 
            $this->post($poem->path().'/replies',$reply->toArray());
    
    
    
        }
    /** @test */
    public function an_authenticated_user_can_participate_in_forum_poem()
    {

        //given we have an_authenticated_user
        $this->signIn();
        //Add existing Poem
        $poem= create('App\Poem');
        //make a reply
        $reply = make('App\Reply');
        //create the url and pass the reply to it 
       
        $this->post($poem->path().'/replies',$reply->toArray());

        //make sure we see the reply in poem page
        $this->get($poem->path())
        ->assertSee($reply->body);


    }
    
     /** @test */
     public function an_authenticated_user_can_update_reply()
     {
 
         //given we have an_authenticated_user
         $this->signIn();
         //Add existing Poem
       
         //create a reply
         $reply = create('App\Reply', ['user_id'=>auth()->id()]);
         //create the url and pass the reply to it 
        $newbody= 'the body has updated';
         $this->patch("/replies/{$reply->id}",['body'=>$newbody]);
 
         //make sure we see the update  body

         $this->assertDatabaseHas('replies',['id'=>$reply->id,'body'=>$newbody]);
 
     }
     /** @test */
     public function unauthrised_user_maynot_update_a_reply()
     {
        $this->withExceptionHandling();

         $reply = create('App\Reply');
         
 
         $this->patch("/replies/{$reply->id}")->assertRedirect('/login'); 
         
         $this->signIn();
         $this->patch("/replies/{$reply->id}")->assertStatus(403); 
     }

       
}
