
@extends('layouts.app')

@section('content')
  
             
<div class="box">
        <div class="container">
             <div class="row">
                   

                     @forelse ($poets as $poet)

                    		 
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
                        <div class="box-part text-center">
                            
                            <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
                            
                            <div class="title">
                                <h4>{{ $poet->first_name }} &nbsp{{ $poet->last_name}}</h4>
                            </div>
                            
                            <div class="text">
                                <span>{{ $poet->about }}</span>
                            </div>
                            
                            <a href="#">Learn More</a>
                            
                         </div>
                    </div>
                    
                @empty
                <p>There are no relevant results at this time.</p>
            
            @endforelse                       

		
                </div>		
                </div>
                </div>	 
                    


@endsection  