<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChannelTest extends TestCase
{
    /** @test */
     function a_channel_conissts_of_poem()
    {
        $channel = create('App\Channel');

        $poem= create('App\Poem',['channel_id'=>$channel->id]);
        
        

        $this->assertTrue($channel->poems->contains($poem));
    }
}
