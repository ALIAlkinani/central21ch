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
        <div class="col-md-8">
            @foreach ($poem->replies as $reply)
                
           
            <div class="card">   
                <div class="card-header">
                   <a href="#"> {{ $reply->owner->name }}</a> said at {{ $reply->created_at->diffForHumans() }}</div>            


                <div class="card-body">
              {{$reply->body  }}

                </div>
            </div>    
            
            <br>
            @endforeach                          
        </div>
    </div>
          
</div>
@endsection