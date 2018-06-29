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
    /** @test */
    public function a_user_can_browes_a_specific_poem()
    {
        $poem= create('App\Poem');
        
        
        $this->get($poem->path()) -> assertSee($poem->title);
    }

      /** @test */
      public function a_user_can_read_replies_associated_with_poem()
      {
          $poem= create('App\Poem');
          $reply= create('App\Reply',['poem_id'=>$poem->id]);
          
          
          $this->get($poem->path()) -> assertSee($reply->body);
      }
      
}
