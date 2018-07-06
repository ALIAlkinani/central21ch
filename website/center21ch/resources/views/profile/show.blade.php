@extends('layouts.app')
@section('content')

        <div class="container">
       <div class="raw">
           <div class="col-md-8 col-md-offset-2">
                <div class="pageheader">
                    
                        <h2> {{ $profileUser->name }}  
                            <small>{{ $profileUser->created_at->diffforHumans() }}</small> </h2>
                </div>

                @foreach ($poems as $poem)
            
                <div class="card">               
            
                    <div class="card-header">
                        <h5 class="flex">{{ $poem->title }} </h5>
                        
                              {{ $poem->created_at->diffForhumans() }} </div>
            
                    <div class="card-body">
                        {{$poem->body  }}
            
                    </div>
                    
                </div>
            
                    
                @endforeach
            
                {{ $poems->links() }}
            </div>

                
           </div>
</div>
    
@endsection
