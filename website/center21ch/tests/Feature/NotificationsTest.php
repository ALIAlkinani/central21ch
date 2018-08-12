<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationsTest extends TestCase
{

    use RefreshDatabase;
    
    
    /**   @test  */
    function a_notification_is_prepared_when_a_poem_recieved_a_new_reply_that_is_not_by_the_current_user()
    {
        $this->signIn();
        $poem = create('App\Poem')->subscribe();
       

        // the user will not get notifications;

        $this->assertCount(0,auth()->user()->notifications);

        // when a new reply lefted
            $poem->addReply([
                'user_id'=>auth()->id(),
                'body'=>"some text body"

            ]);


        // the user will get notifications
            $this->assertCount(0,auth()->user()->fresh()->notifications);
            
        // when a new reply lefted
        $poem->addReply([
            'user_id'=>create('App\User')->id,
            'body'=>"some text body"

        ]);


    // the user will get notifications
        $this->assertCount(1,auth()->user()->fresh()->notifications);
    
    }

    /** @test */
    function a_user_can_fetch_all_unread_notification(){

        $this->signIn();
        $poem = create('App\Poem')->subscribe();
       

        // the user will not get notifications;

       

        // when a new reply lefted
            $poem->addReply([
                'user_id'=>create('App\User')->id,
                'body'=>"some text body"

            ]);

                    $user =auth()->user();
                   

        

          $response =   $this->getJson("/profile/{$user->name}/notifications")->json();

            $this->assertCount(1,$response);


    }

    /** @test */

    public function a_user_can_mark_notification()
    {
        $this->signIn();
        $poem = create('App\Poem')->subscribe();
       

        // the user will not get notifications;

       

        // when a new reply lefted
            $poem->addReply([
                'user_id'=>create('App\User')->id,
                'body'=>"some text body"

            ]);

                    $user =auth()->user();
                    $notificationId = $user->unreadNotifications->first()->id;

            $this->assertCount(1,$user->unreadNotifications);

            $this->delete("/profile/{$user->name}/notifications/{$notificationId}");

            $this->assertCount(0,$user->fresh()->unreadNotifications);

    
    }
}
