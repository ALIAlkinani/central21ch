@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
@endsection

@section('content')
<div class="container">
<div class="col-md-10" >
@forelse ($poems as $poem)
<br>
<div class="d-flex justify-content-center">
       <h4>
            <a href="{{ $poem->path() }}">
                    @if (auth()->check() && $poem->hasUpdatesFor(auth()->user()))
                        <strong>
                            {{ $poem->title }}
                        </strong>
                    @else
                        {{ $poem->title }}
                    @endif
                </a>
       </h4>
    </div>
    <div class="card card-default">
            
        <div class="card">
               
            <div class="level">
                <div class="flex">
                    
                    <h6>
                        <div class="creator">
                                <img src="{{ $poem->creator->avatar_path }}"
                                alt="{{ $poem->creator->name }}"
                                width="25"
                                height="25"
                                class="mr-1 rounded-circle"> Posted By: <a href="{{ route('profile', $poem->creator) }}">{{ $poem->creator->name }}</a>

                        </div>
                     
                    </h6>
                </div>
                <a href="{{ $poem->path() }}">
                    {{ $poem->replies_count }} {{ str_plural('reply', $poem->replies_count) }}
                </a>
            </div>
        </div>
        <div class="content">
            <div class="body">{!! $poem->body !!}</div>
        </div>
  
        
    </div>
<div>
 

    </div>



@empty
    <p>There are no relevant results at this time.</p>

    


</div>
</div>

@endforelse 
</div>
<br>
<div>
        {{ $poems->links() }}	
</div>
@endsection