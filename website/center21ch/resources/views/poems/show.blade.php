@extends('layouts.app')

@section('content')
<div class="container">

    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">               

                <div class="card-header">{{ $poem->title }} created by <a href="#">{{ $poem->creator->name }}</a> before {{ $poem->created_at->diffForhumans() }} </div>

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
                <form action="{{ $poem->path(). '/replies' }}" method="post">
                    @csrf
                    <div class="form-group">
                            <textarea name="body" id="body" cols="101" placeholder="write someting here" rows="5"></textarea>
    
                    </div>
    
                    <button type="submit" class="btn btn-dark">Publish</button>
    
    
                </form>                     
                    @else
                        <p class="text-center" > Please <a href="{{ route('login') }}">SingIn</a> to participate in the discussion</p>
                    @endif
    
            </div>
        </div>
    
          
</div>
@endsection