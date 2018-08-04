@extends('layouts.app')

@section('content')
<poem-view :initial-replies-count = "{{ $poem->replies_count }}" inline-template v-cloak>  
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
            <replies :data="{{$poem->replies}}" @added="repliesCount++"  @removed="repliesCount--"></replies>

                 
    
           </div>            

        
        <div class="col-md-4">
                <div class="card">                       
                        <div class="card-body">
                        Created by <a href="/profile/{{ $poem->Creator->name  }}">{{ $poem->Creator->name  }}</a> before {{ $poem->created_at->diffForhumans() }}                     
                           and currently has <span v-text="repliesCount"></span> {{ str_plural('commit', $poem->replies_count) }}
    
                        </div>{{--  end of side div body  --}}
                    
                </div> {{--  end of card   --}} 
                
              
        

        </div>
    </div>    
     
</poem-view>
          
</div>
@endsection