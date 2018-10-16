<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Activity;
use Carbon\Carbon;

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

    
 
 
    
    $this->assertEquals($activity->subject_id, $poem->id) ;    
   }
/** @test */
   public function it_record_activity_when_reply_created()
   {
       $this->signIn();
       
       $reply= create('App\Reply');

       $this->assertEquals(4,Activity::count()->get());
       

   }
   /** @test */
   public function it_fetch_feed_for_any_user()
   {
       //given we have unauthenticated User
       $this->signIn();
       // create a poem in current time 
       create('App\Poem',['user_id'=>2222]);

        // create a poem in one week before
       create('App\Poem',['user_id'=>auth()->id(),

        'created_at'=> Carbon::now()->subWeek()   
               
        ]);
       

        $feed = Activity::feed(auth()->user());


      
       $this->assertTrue($feed->keys()->contains(
            Carbon::now()->format('Y-M-d')

       ));
       

   }
   
}
