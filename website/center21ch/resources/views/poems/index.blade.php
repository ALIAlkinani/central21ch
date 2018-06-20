@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($poems as $poem )
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">               

                <div class="card-header"><a href="{{ $poem->path() }}">{{ $poem->title }}</a></div>

                <div class="card-body">
                    {{$poem->body  }}

                </div>
            </div>                   
                                       
        </div>
    </div>

    @endforeach           
</div>
@endsection
