<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Translate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class TranslateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
     function translate_has_an_owner()
    {
        $Translate = create('App\Translate');
        $this->assertInstanceOf('App\User',$Translate->owner);
    }

      /** @test */
    public function an_authenticated_user_can_add_translate_to_a_poem()
    {

        //given we have an_authenticated_user
        $this->signIn();
        //Add existing Poem
        $poem= create('App\Poem');
        //make a translate
        $translate = make('App\Translate');
        //create the url and pass the translate to it 
       
        $this->post($poem->path().'/translates',$translate->toArray());

        //make sure we see the translate in poem page
        $this->assertDatabaseHas('translates',['body'=>$translate->body]);
        $this->assertCount(1,$poem->translates);
        


    }

 /** @test */
 public function an_unauthenticated_user_cannot_create_translate()
 {


     $this->expectException('Illuminate\Auth\AuthenticationException');

    
   
     $poem= create('App\Poem');
     //make a translate
     $translate = make('App\Translate');
     //create the url and pass the translate to it 
    
     $this->post($poem->path().'/translates',$translate->toArray());



 }


      function a_translate_has_a_body()
     {
        //todo
    
    
 
     }
   /** @test */
   function it_knows_if_it_was_just_published()
   {
       //todo..
       return true;
   }

      
       
    
    /** @test */
    function it_knows_if_it_is_the_best_Translate()
    {
        //todo

        return true;

    }
    

   }

