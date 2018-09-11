
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div id="map" style="width:100%;height:400px;padding:20px">
            <script>
                function initMap() {
                        var mapCanvas = document.getElementById("map");
                        var myCenter=new google.maps.LatLng(0, 0);
                        var mapOptions = {center: myCenter, zoom: 2};
                        var map = new google.maps.Map(mapCanvas, mapOptions);
                        }  
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW9FAJC34z2wKmGJJvW-QxF_ObdLfuzH4&callback=initMap">
            </script>
            </div>
            <div class="col-md-8">
                @include ('poems._list')
                <br>

                {{ $poems->render() }}
               
            </div>

            <div class="col-md-4">
                @if (count($trending))
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">
                            Trending Poems
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($trending as $poem)
                                    <li class="list-group-item">
                                        <a href="{{ url($poem->path) }}">
                                            {{ $poem->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        

    </div>
@endsection