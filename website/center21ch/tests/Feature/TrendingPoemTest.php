<?php
namespace Tests\Feature;
use App\Trending;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class TrendingPoemsTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp()
    {
        parent::setUp();
        $this->trending = new Trending();
        $this->trending->reset();
    }
    /** @test */
    public function it_increments_a_poems_score_each_time_it_is_read()
    {
        $this->assertEmpty($this->trending->get());
        $poem = create('App\Poem');
        $this->call('GET', $poem->path());
        $this->assertCount(1, $trending = $this->trending->get());
        $this->assertEquals($poem->title, $trending[0]->title);
    }
}