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
        <form action="{{ $poem->path . '/replies' }}" method="post">

            

            
        </form>
          
</div>
@endsection