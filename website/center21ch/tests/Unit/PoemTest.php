<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PoemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
     function it_has_an_creator()
    {
        $poem = create('App\Poem');
        $this->assertInstanceOf('App\User',$poem->creator);
    }
   
}