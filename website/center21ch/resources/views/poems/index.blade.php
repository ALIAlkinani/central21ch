@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
                    
        <div class="col-md-8">
         @forelse ($poems as $poem )
         
            <div class="card">               

                <div class="penal-header level"> 
                    <h6 class="flex"> <a href="{{ $poem->path() }}">

                      

                        @if ( $poem->hasUpdatedFor())
                            <strong> <h5> {{ $poem->title }} </h5></strong>
                       
                        @else
                        {{ $poem->title }}
                        @endif
                       
                    
                    
                    </a>
                        
                        
                        created by <a href="/poems?by={{ $poem->creator->name  }}">{{ $poem->creator->name }}</a> {{ $poem->created_at->diffForhumans() }} </h6>
                <a href="{{ $poem->path() }}"> <span class="commit">  {{ $poem->replies_count }} {{ str_plural('Reply', $poem->replies_count) }}</span>
                </a>
                
                </div>

                <div class="card-body">
                    {{$poem->body  }}

                </div>
            
            </div>
                
                
            <br>  
            @empty
                <p>There are no relevant results at this time.</p>
          
            @endforelse              
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
