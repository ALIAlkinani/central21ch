<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Activity;

class activitiesTest extends TestCase
{
    use RefreshDatabase;
   /** @test */
   public function it_recode_activity_when_Poem_is_create()
   {
       $this->signIn();

    $poem = create('App\Poem');
    $this->assertDatabaseHas('activities',[

        'type' => 'created_poem',
        'user_id' =>auth()->id(),
        'subject_id'=>$poem->id,
        'subject_type'=>'App\Poem'

    ]);

    $activity = Activity::first();
    $this->assertEquals($activity->subject->id, $poem->id)  ;    
   }
/** @test */
   public function it_record_activity_when_reply_created()
   {
       $this->signIn();
       
       $reply= create('App\Reply');

       $this->assertEquals(2,Activity::count());
       

   }
}
