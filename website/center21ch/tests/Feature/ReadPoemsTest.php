<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadPoemsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_user_can_browes_poems()
    {
        $poem= create('App\Poem');
        $this->get('/poems') -> assertSee($poem->title);
    }
}
