<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class profileTest extends TestCase
{
    /** @test */
    public function a_user_has_profile()
    {
        $user = create('App\User');
        $this->get('/profile/'. $user->name )
        ->assertSee($user->name);
    }
    
}
