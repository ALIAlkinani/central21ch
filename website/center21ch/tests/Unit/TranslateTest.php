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

 /** @test */
 public function unauthrised_user_maynot_delete_a_Translate()
 {
    $this->withExceptionHandling();

     $translate = create('App\Translate');
     

     $this->delete("/translates/{$translate->id}")->assertRedirect('/login'); 
     
     $this->signIn();
     $this->delete("/translates/{$translate->id}")->assertStatus(403); 
 }

 /** @test */
 public function authrised_user_can_delete_a_translate()
 {
    
     $this->signIn();
     $translate = create('App\Translate',['user_id'=>auth()->id()]);               
     $this->assertEquals(1,$translate->poem->fresh()->translates_count);
     $this->delete("/translates/{$translate->id}");
     $this->assertDatabaseMissing('translates',['id'=>$translate->id]);
     
     $this->assertEquals(0,$translate->poem->fresh()->translates_count);

 
 }


           /** @test */
           function a_transalte_has_a_body()
           {
              $this->expectException('Illuminate\Validation\ValidationException');
               //given we have an_authenticated_user
               $this->signIn();
               //Add existing Poem
               $poem= create('App\Poem');
               //make a Translate
               $Translate = make('App\Translate',['body'=>null]);
               //create the url and pass the Translate to it 
              
               $this->post($poem->path().'/translates',$Translate->toArray());
       
               //make sure we see the Translate in poem page
               $this->get($poem->path())  
               ->assertSessionHasErrors('body');   
          
          
       
           }
           
           /** @test */
           function a_transalte_has_a_language()
           {
              $this->expectException('Illuminate\Validation\ValidationException');
               //given we have an_authenticated_user
               $this->signIn();
               //Add existing Poem
               $poem= create('App\Poem');
               //make a Translate
               $Translate = make('App\Translate',['language'=>null]);
               //create the url and pass the Translate to it 
              
               $this->post($poem->path().'/translates',$Translate->toArray());
       
               //make sure we see the Translate in poem page
               $this->get($poem->path())  
               ->assertSessionHasErrors('language');   
          
          
       
           }
 
   function it_knows_if_it_was_just_published()
   {
       //todo..
       return true;
   }

      
       
    
    
    function it_knows_if_it_is_the_best_Translate()
    {
        //todo

        return true;

    }
    

   }

