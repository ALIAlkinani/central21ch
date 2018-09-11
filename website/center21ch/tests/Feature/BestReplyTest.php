<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class BestReplyTest extends TestCase
{
 use RefreshDatabase;
    /** @test */
    function a_poem_creator_may_mark_any_reply_as_the_best_reply()
    {
        $this->signIn();
        $poem = create('App\Poem', ['user_id' => auth()->id()]);
        $replies = create('App\Reply', ['poem_id' => $poem->id], 2);
        $this->assertFalse($replies[1]->isBest());
        $this->postJson(route('best-replies.store', [$replies[1]->id]));
        $this->assertTrue($replies[1]->fresh()->isBest());
    }
    /** @test */
    function only_the_poem_creator_may_mark_a_reply_as_best()
    {
        $this->withExceptionHandling();
        $this->signIn();
        $poem = create('App\Poem', ['user_id' => auth()->id()]);
        $replies = create('App\Reply', ['poem_id' => $poem->id], 2);
        $this->signIn(create('App\User'));
        $this->postJson(route('best-replies.store', [$replies[1]->id]))->assertStatus(403);
        $this->assertFalse($replies[1]->fresh()->isBest());
    }
    /** @test */
    function if_a_best_reply_is_deleted_then_the_poem_is_properly_updated_to_reflect_that()
    {
        $this->signIn();
        $reply = create('App\Reply', ['user_id' => auth()->id()]);
        $reply->poem->markBestReply($reply);
        $this->deleteJson(route('replies.destroy', $reply));
        $this->assertNull($reply->poem->fresh()->best_reply_id);
    }
}