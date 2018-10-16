
@extends('layouts.app')

@section('content')
  
             
<div class="box">
        <div class="container">
             <div class="row">
                  

                     @forelse ($poets as $poet)

                    		 
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
                        <div class="box-part text-center">
                            
                            <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
                            <img src="{{ $poet->avatar_path }}"
                                alt="{{ $poet->last_name }}"
                                width="110"
                                height="120"
                                class="mr-1">
                            <div class="title">
                                <h4>{{ $poet->first_name }} &nbsp{{ $poet->last_name}}</h4>
                            </div>
                            
                            <div class="text">
                                <span>{{ $poet->about }}</span>
                            </div>
                            
                            <a href="{{ $poet->path() }}">Learn More</a>
                            
                         </div>
                    </div>
                    
                @empty
                <p>There are no relevant results at this time.</p>
            
            @endforelse                       

		
                </div>
            
                <div class="pagination justify-content-center">
                        {{ $poets->links() }}	
                </div>
            
                	
                </div>
                </div>	 
                    


@endsection  