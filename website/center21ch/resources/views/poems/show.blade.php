@extends('layouts.app')

@section('content')
<div class="container">

    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">               

                <div class="card-header">{{ $poem->title }} created by <a href="/poems?by={{ $poem->creator->name  }}">{{ $poem->creator->name }}</a> before {{ $poem->created_at->diffForhumans() }} </div>

                <div class="card-body">
                    {{$poem->body  }}

                </div>
            </div>                   
                                       
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
    @include('reply.index')
    </div>
    @if (auth()->check())

    <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
               <div class="card">
                   <div class="card-header">
                       <h5>Reply to the poem</h5>
                   </div>
                    <form action="{{ $poem->path(). '/replies' }}" method="post">
                            @csrf
                            <div class="card-body">
                                    <div class="form-group">
                                            <textarea name="body" id="body" class="form-control" placeholder="write someting here" rows="5"></textarea>
                    
                                    </div>
                    
                                    <button type="submit" class="btn btn-primary">Publish</button>
                    
                    
                                </form>  
                            
                            </div> 
            
            </div>                  
                    @else
                        <p class="text-center" > Please <a href="{{ route('login') }}">SingIn</a> to participate in the discussion</p>
                    @endif
    
            </div>
        </div>
    
          
</div>
@endsection