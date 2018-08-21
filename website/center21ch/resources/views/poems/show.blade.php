@extends('layouts.app')
{{--  @section('head')
<link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
@endsection  --}}
@section('content')
<poem-view :initial-replies-count = "{{ $poem->replies_count }}" inline-template v-cloak>  
<div class="container">

 
    <div class="row">
        <div class="col-md-8">
            <div class="card">               

                <div class="panel-header level">

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

                <div class="panel-body">
                    {{$poem->body  }}

                </div>
               
            </div> 
            <replies @added="repliesCount++"  @removed="repliesCount--" ></replies>

                 
    
           </div>            

        
        <div class="col-md-4">
                <div class="card">                       
                        <div class="card-body">
                        Created by <a href="/profile/{{ $poem->Creator->name  }}">{{ $poem->Creator->name  }}</a> before {{ $poem->created_at->diffForhumans() }}                     
                           and currently has <span v-text="repliesCount"></span> {{ str_plural('commit', $poem->replies_count) }}
    
                        </div>{{--  end of side div body  --}}
                      
              <p>
                <subscribe-button :active={{  json_encode($poem->isSubscribedTo) }}></subscribe-button>
            </p>
      
                </div> {{--  end of card   --}} 
              

        </div>
    </div>    
     
</poem-view>
          
</div>
@endsection