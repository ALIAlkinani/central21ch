<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Poet;


class createPoetTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->poet= make('App\Poet');
        
    }
        /** @test */
        public function an_unauthenticated_user_cannot_create_a_poet()
        {


            $this->expectException('Illuminate\Auth\AuthenticationException');
    
           
           //make a Poet
       
      
           //create the url and pass the poet to it 
           $this->post('/poets',$this->poet->toArray());
    
    
    
        }
    /** @test */
    public function an_authenticated_user_can_create_a_poet()
    {

        //given we have an_authenticated_user
        $this->signIn();
        //make a Poet
        
      
        //create the url and pass the poet to it 
        $this->post('/poets',$this->poet->toArray())
        ->assertStatus(302);
       


    }
    /** @test */
    public function an_unauthenticated_user_cannot_see_the_create_poet_page()
    {

      
        $this->expectException('Illuminate\Auth\AuthenticationException');
        // user cannot go to create page 
        $this->get('/poets/create');


    }

    
    /** @test */
    function a_poet_required_a_title()
    
    {
        $this->publish_a_poet(['title' =>null]) 
        ->assertSessionHasErrors('title');   
    
    }

        
    /** @test */
    function a_poet_required_a_body()
    
    {
        
        $this->publish_a_poet(['body' =>null])        
        ->assertSessionHasErrors('body');   
    
    }
    /**@test */
    public function publish_a_poet($overrides = [])
    {


        $this->expectException('Illuminate\Validation\ValidationException');


        $this->signIn();
        $poet = make('App\Poet', $overrides);
        return $this->post('/poets',$poet->toArray());
        
    }
    /** @test */
    public function authrised_user_may_delete_a_poet()
    {
        $this->signIn();
        $poet = create('App\Poet',['user_id'=>auth()->id()]);
        $reply = create('App\Reply',['poet_id' =>$poet->id]);


        $this->Json('DELETE',$poet->path());

        $this->assertDatabaseMissing('poets',['id'=>$poet->id]);
        $this->assertDatabaseMissing('replies',['id'=>$reply->id]);
        $this->assertDatabaseMissing('activities',[
            
            'subject_id' =>$poet->id,
            'subject_type' =>get_class($poet)
            
            ]);
            $this->assertDatabaseMissing('activities',[
            
                'subject_id' =>$reply->id,
                'subject_type' =>get_class($reply)
                
                ]);
    
    



        
    }

      /** @test */
      public function unauthrised_user_maynot_delete_a_poet()
      {
         $this->withExceptionHandling();

        $poet = create('App\Poet');
          
  
          $this->delete($poet->path())->assertRedirect('/login'); 
          
          $this->signIn();
          $this->delete($poet->path())->assertStatus(403); 
      }
           
        
   
}
