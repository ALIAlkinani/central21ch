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
      
}
