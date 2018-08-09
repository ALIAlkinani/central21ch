<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class test extends TestCase
{
    use RefreshDatabase;

       /** @test */
       public function a_user_can_subscribe_to_poem()
       {
           $this->signIn();
           $poem = create("App\Poem");
   
           $this->post($poem->path() . '/subscriptions');
   
   
   
           $this->assertCount(1,$poem->subscriptions);
           
       }
}

