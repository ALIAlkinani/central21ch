@extends('layouts.app')

@section('content')
<div class="container">

    
    <div class="row">
        <div class="col-md-8">
            <div class="card">               

                <div class="card-header">

                    <h5 class="flex"> {{ $poem->title }} </h5>

                    <div>
                        @can ('update', $poem)
                        <form action="{{ $poem->path() }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            
                        @endcan
                       

                        
                    </div>
                    
                   </div>

                <div class="card-body">
                    {{$poem->body  }}

                </div>
                <hr>
            </div>                   
                @include('reply.index')  
            
                <br>  
            <div class="card">
                  <div class="card-header">
                     <h5>Reply to the poem</h5>
                 </div>
               
                     <form action="{{ $poem->path(). '/replies' }}" method="post">
                         @csrf
                        
                         <div class="card-body">
                                @if (auth()->check())
                                 <div class="form-group">
                                         <textarea name="body" id="body" class="form-control" placeholder="write someting here" rows="5"></textarea>
                 
                                 </div>
                 
                                 <button type="submit" class="btn btn-primary">Publish</button>
                 
             
                    </form>  
                                    @else
                            <p class="text-center" > Please <a href="{{ route('login') }}">SingIn</a> to participate in the discussion</p>
                           
                           
                            @endif
                        </div> 
                      

             </div>                  
                 
    
           </div>            

        
        <div class="col-md-4">
                <div class="card">                       
                        <div class="card-body">
                        Created by <a href="/profile/{{ $poem->Creator->name  }}">{{ $poem->Creator->name  }}</a> before {{ $poem->created_at->diffForhumans() }}                     
                           and currently has {{ $poem->replies_count }} {{ str_plural('commit', $poem->replies_count) }}
    
                        </div>{{--  end of side div body  --}}
                    
                </div> {{--  end of card   --}} 
                
              
        

        </div>
    </div>    
     
    
          
</div>
@endsection