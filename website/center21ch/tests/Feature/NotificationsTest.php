<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(){
        parent::setUp();
        $this->signIn();
    }
    
    
    /**   @test  */
    function a_notification_is_prepared_when_a_poem_recieved_a_new_reply_that_is_not_by_the_current_user()
    {
        $poem = create('App\Poem')->subscribe();

        $this->assertCount(0, auth()->user()->notifications);

        $poem->addReply([
            'user_id' => auth()->id(),
            'body' => 'Some reply here'
        ]);

        $this->assertCount(0, auth()->user()->notifications);

        $poem->addReply([
            'user_id' => create('App\User')->id,
            'body' => 'Some reply here'
        ]);

        $this->assertCount(2, auth()->user()->fresh()->notifications);
    
    }

    /** @test */
    function a_user_can_fetch_all_unread_notification(){

        
       create(DatabaseNotification::class);

                    $user =auth()->user();           

               

            $this->assertCount(1,$this->getJson("/profile/{$user->name}/notifications")->json());


    }

    /** @test */

    public function a_user_can_mark_notification()
    {
        create(DatabaseNotification::class);


     tap(auth()->user(), function($user){
                
            $this->assertCount(1,$user->unreadNotifications);

            $this->delete("/profile/{$user->name}/notifications/" .  $user->unreadNotifications->first()->id);

            $this->assertCount(0,$user->fresh()->unreadNotifications);

                    });
    }
}
