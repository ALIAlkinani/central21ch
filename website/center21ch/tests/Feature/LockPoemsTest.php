<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class LockPoemsTest extends TestCase
{  

    use RefreshDatabase;
       /** @test */
    function non_administrators_may_not_lock_poems()
    {
        $this->withExceptionHandling();
        $this->signIn();
        $poem = create('App\Poem', ['user_id' => auth()->id()]);
        $this->post(route('locked-poems.store', $poem))->assertStatus(403);
        $this->assertFalse(! ! $poem->fresh()->locked);
    }
    /** @test */
    function administrators_can_lock_poems()
    {
        $this->signIn(factory('App\User')->states('administrator')->create());
        $poem = create('App\Poem', ['user_id' => auth()->id()]);
        $this->post(route('locked-poems.store', $poem));
        $this->assertTrue(! ! $poem->fresh()->locked, 'Failed asserting that the poem was locked.');
    }
    /** @test */
    public function once_locked_a_poem_may_not_receive_new_replies()
    {
        $this->signIn();
        $poem = create('App\Poem');
        $poem->lock();
        $this->post($poem->path() . '/replies', [
            'body' => 'Foobar',
            'user_id' => auth()->id()
        ])->assertStatus(422);
    }
}