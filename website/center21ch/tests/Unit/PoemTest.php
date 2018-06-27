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

     /** @test */
     function it_has_an_reply()
    {
        $poem = create('App\Poem');

         $poem->addReply([
           'body' => 'add new reply',
           'user_id'=> 1
       ]);
        $this->assertCount(1,$poem->replies);
    }

    function a_poem_belongs_to_channel()
    {
        $poem = create('App\Poem');

     
        $this->assertCount(1,$poem->replies);
        $this->asertInstanceOf('App/Channel',$poem->channel);
    }
    
    
    
   
}