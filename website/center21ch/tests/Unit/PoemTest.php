<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class PoemTest extends TestCase
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
     /** @test */
    function a_poem_belongs_to_channel()
    {
        $poem = create('App\Poem');    
       
        $this->assertInstanceOf('App\Channel',$poem->channel);
    }
/** @test */
    function a_poem_can_make_a_string_path()
    {
        $poem = create("App\Poem");
        $this->assertEquals("/poems/{$poem->channel->slug}/{$poem->id}",$poem->path());
    }


    
    
    
   
}