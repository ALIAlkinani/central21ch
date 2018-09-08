<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Reply;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

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
   /** @test */
   function it_knows_if_it_was_just_published()
   {
       $reply = create('App\Reply');
       $this->assertTrue($reply->wasJustPublished());
       $reply->created_at = Carbon::now()->subMonth();
       $this->assertFalse($reply->wasJustPublished());
   }

       /** @test */
       function it_can_detect_all_mentioned_users_in_the_body()
       {
           $reply = create('App\Reply', [
               'body' => '@JaneDoe wants to talk to @JohnDoe'
           ]);
           $this->assertEquals(['JaneDoe', 'JohnDoe'], $reply->mentionedUsers());
       }
       /** @test */
    function it_wraps_mentioned_usernames_in_the_body_within_anchor_tags()
    {
        $reply = new Reply([
            'body' => 'Hello @Samm-Doe.'
        ]);
        $this->assertEquals(
            'Hello <a href="/profile/Samm-Doe">@Samm-Doe</a>.',
            $reply->body
        );
    }
    
    /** @test */
    function it_knows_if_it_is_the_best_reply()
    {
        $reply = create('App\Reply');

        $this->assertFalse($reply->isBest());

        $reply->poem->update(['best_reply_id' => $reply->id]);

        $this->assertTrue($reply->fresh()->isBest());
    }
     /** @test */
     function a_reply_body_is_sanitized_automatically()
     {
         $reply = make('App\Reply', ['body' => '<script>alert("bad")</script><p>This is okay.</p>']);
         $this->assertEquals("<p>This is okay.</p>", $reply->body);
     }

   }

