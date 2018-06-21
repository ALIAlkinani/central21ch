@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($poems as $poem )
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">               

                <div class="card-header"> 
                     <a href="{{ $poem->path() }}">{{ $poem->title }}</a> created by <a href="#">{{ $poem->creator->name }}</a> before {{ $poem->created_at->diffForhumans() }} </div>

                <div class="card-body">
                    {{$poem->body  }}

                </div>
            </div>                   
                                       
        </div>
    </div>

    <br>

    @endforeach           
</div>
@endsection
