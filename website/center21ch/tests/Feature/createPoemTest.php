<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class createPoemTest extends TestCase
{
    use RefreshDatabase;
        /** @test */
        public function an_unauthenticated_user_cannot_create_a_poem()
        {


            $this->expectException('Illuminate\Auth\AuthenticationException');
    
           
           //make a Poem
        $poem= make('App\Poem');
      
        //create the url and pass the poem to it 
        $this->post('/poems',$poem->toArray());
    
    
    
        }
    /** @test */
    public function an_authenticated_user_can_create_a_poem()
    {

        //given we have an_authenticated_user
        $this->signIn();
        //make a Poem
        $poem= make('App\Poem');
      
        //create the url and pass the poem to it 
       $response =  $this->post('/poems',$poem->toArray());

        //make sure we see the body and the title in poem page
        $this->get($response->headers->get('location'))
        ->assertSee($poem->title)
        ->assertSee($poem->body);


    }
    /** @test */
    public function an_unauthenticated_user_cannot_see_the_create_poem_page()
    {

      
        $this->expectException('Illuminate\Auth\AuthenticationException');
        // user cannot go to create page 
        $this->get('/poems/create');


    }

    
    /** @test */
    function a_poem_required_a_title()
    
    {
        $this->publish_a_poem(['title' =>null]) 
        ->assertSessionHasErrors('title');   
    
    }

        
    /** @test */
    function a_poem_required_a_body()
    
    {
        
        $this->publish_a_poem(['body' =>null])        
        ->assertSessionHasErrors('body');   
    
    }
    /** @test */
    function a_poem_required_a_channal()
    
    {
        factory('App\Poem',2)->create();
        
        $this->publish_a_poem(['channel_id' =>null])        
        ->assertSessionHasErrors('channel_id');

        $this->publish_a_poem(['channel_id' =>999])        
        ->assertSessionHasErrors('channel_id'); 
       
    
    }

    public function publish_a_poem($overrides = [])
    {


        $this->expectException('Illuminate\Validation\ValidationException');


        $this->signIn();
        $poem = make('App\Poem', $overrides);
        return $this->post('/poems',$poem->toArray());
        
    }
}
