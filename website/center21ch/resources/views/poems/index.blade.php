@extends('layouts.app')

@section('content')
<div class="container">

   
    <div class="row">
        <div class="col-md-8">
                @foreach ($poems as $poem )
            <div class="card">               

                <div class="card-header"> 
                     <a href="{{ $poem->path() }}">{{ $poem->title }}</a> created by <a href="/poems?by={{ $poem->creator->name  }}">{{ $poem->creator->name }}</a> before {{ $poem->created_at->diffForhumans() }} </div>

                <div class="card-body">
                    {{$poem->body  }}

                </div>
            </div>   
            @endforeach                 
           {{--   {{ $paginate->links() }}   --}}                         
        </div>
    </div>

    <br>

            
</div>

@if ($flash= session('message'))
<div id="flash-message" class="alert alert-success" role="alert">

    {{ $flash }}

    @endif

</div>
@endsection
