@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div id="map" style="width:100%;height:400px;"></div>

        <script>
            function initMap() {
                var centre = {lat: 0, lng: 0};
                var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 2, center: centre});
            }
        </script>

        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW9FAJC34z2wKmGJJvW-QxF_ObdLfuzH4&callback=initMap">
        </script>
            
        <div class="col-md-8">
         @forelse ($poems as $poem )
         
            <div class="card">               

                <div class="card-header"> 
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
