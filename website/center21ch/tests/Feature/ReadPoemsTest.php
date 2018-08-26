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
        function a_user_can_filte_a_poem_according_to_a_channel()
       {
            $channel = create('App\Channel');

            $poemInchannel= create('App\Poem',['channel_id'=>$channel->id]);          
           
           
           $this->get('/poems/' . $channel->slug)
             -> assertSee($poemInchannel->title)
             -> assertSee($poemInchannel->body);
       }
              /** @test */
        function a_user_can_filte_a_poem_by_any_username()
              {

                //login as ali alkinani
                  $this->signIn(create('App\User',['name'=>'AliAlkinani']));

                    //Ali create a poem
                   $poemByAli = create('App\Poem',['user_id'=>auth()->id()]);
                    //create another poem not created by ali 
                   $poemNotByAli= create('App\Poem');          
                  
                  
                  $this->get('/poems?by=AliAlkinani')
                    -> assertSee($poemByAli->title)
                    -> assertDontSee($poemNotByAli->title);
              }

             /** @test */
        function a_user_can_filte_a_poem_by_popularity()
        {

          //given we have three poems
         //with replies, 2 ,3,0 respactively
         $poemsWithTwoReplies = create('App\Poem');
         create('App\Reply',['poem_id' => $poemsWithTwoReplies->id],2);


         $poemsWithThreeReplies = create('App\Poem');
         create('App\Reply',['poem_id' => $poemsWithThreeReplies->id],5);

         $poemsWithOneReplies = create('App\Poem');
         create('App\Reply',['poem_id' => $poemsWithOneReplies->id],3);
            
          //when I filter all poems by popularity

          $response = $this->getJson('poems?popularity=1')->json();
          
          //then they most return form most reply to less
          $this->assertEquals([ 5, 3 , 2], array_column($response['data'],'replies_count'));

             
        }
        /** @test */
    function a_user_can_request_all_replies_for_agiven_poem()
    {

      $poem = create('App\Poem');
      create('App\Reply',['poem_id' => $poem->id],2);

      $response = $this->getJson($poem->path() . '/replies')->json();

      $this->assertCount(2,$response['data']);
      
      $this->assertEquals(2,$response['total']);



    }
    /** @test */
    function a_user_can_request_all_unanswered_poems()
    {

      $poem1 = create('App\Poem');
      $poem = create('App\Poem');
      create('App\Reply',['poem_id' => $poem->id]);
     

      $response = $this->getJson('poems?unanswered=1')->json();

      $this->assertCount(1 ,$response['data']);
      
     



    }
           /** @test */
           public function a_user_can_subscribe_to_poem()
           {
               $this->signIn();
               $poem = create("App\Poem");
       
               $this->post($poem->path() . '/subscriptions');
       
       
       
               $this->assertCount(1,$poem->subscriptions);
               
           }
         /** @test */
    function we_record_a_new_visit_each_time_the_poem_is_read()
    {
        $poem = create('App\Poem');
        $this->assertSame(0, $poem->visits);
        $this->call('GET', $poem->path());
        $this->assertEquals(1, $poem->fresh()->visits);
    }

      
}
