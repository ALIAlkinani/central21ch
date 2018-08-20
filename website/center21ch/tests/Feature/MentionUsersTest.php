<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\DatabaseNotification;
class MentionUsersTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function mentioned_users_in_a_reply_are_notified()
    {
        // Given we have a user, JohnDoe, who is signed in.
        $john = create('App\User', ['name' => 'JohnDan']);
        $this->signIn($john);
        // And we also have a user, JaneDoe.
        $jane = create('App\User', ['name' => 'JaneDoe']);
        // If we have a poem
        $poem = create('App\Poem');
        // And JohnDoe replies to that poem and mentions @JaneDoe.
        $reply = make('App\Reply', [
            'body' => 'Hey @JaneDoe check this out.'
        ]);
        $this->json('post', $poem->path() . '/replies', $reply->toArray());
        // Then @JaneDoe should receive a notification.
        $this->assertCount(1, $jane->notifications);
    }
}