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
    public function an_unauthenticated_user_cannot_see_the_create_poet_page()
    {

      
        $this->expectException('Illuminate\Auth\AuthenticationException');
        // user cannot go to create page 
        $this->get('/poets/create');


    }

    
    /** @test */
    function a_poet_required_a_last_name()
    
    {
        $this->publish_a_poet(['last_name' =>null]) 
        ->assertSessionHasErrors('last_name');   
    
    }

        
    /** @test */
    function a_poet_required_a_first_name()
    
    {
        
        $this->publish_a_poet(['first_name' =>null])        
        ->assertSessionHasErrors('first_name');   
    
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
      public function unauthrised_user_maynot_delete_a_poet()
      {
         $this->withExceptionHandling();

        $poet = create('App\Poet');
          
        $this->delete($poet->path())->assertStatus(405);  
           $this->signIn();
          $this->delete($poet->path())->assertStatus(405);  
      }
           
        
   
}
