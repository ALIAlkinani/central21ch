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
}
