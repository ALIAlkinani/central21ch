<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class UpdatePoemTest extends TestCase
{
    use RefreshDatabase;
    public function setUp()
    {
        parent::setUp();
        $this->withExceptionHandling();
        $this->signIn();
    }
    /** @test */
    function unauthorized_users_may_not_update_poems()
    {
        $poem = create('App\Poem', ['user_id' => create('App\User')->id]);
        $this->patch($poem->path(), [])->assertStatus(403);
    }
    /** @test */
    function a_poem_requires_a_title_and_body_to_be_updated()
    {
        $poem = create('App\Poem', ['user_id' => auth()->id()]);
        $this->patch($poem->path(), [
            'title' => 'Changed'
        ])->assertSessionHasErrors('body');
        $this->patch($poem->path(), [
            'body' => 'Changed'
        ])->assertSessionHasErrors('title');
    }
    /** @test */
    function a_poem_can_be_updated_by_its_creator()
    {
        $poem = create('App\Poem', ['user_id' => auth()->id()]);
        $this->patch($poem->path(), [
            'title' => 'Changed',
            'body' => 'Changed body.'
        ]);
        tap($poem->fresh(), function ($poem) {
            $this->assertEquals('Changed', $poem->title);
            $this->assertEquals('Changed body.', $poem->body);
        });
    }
}