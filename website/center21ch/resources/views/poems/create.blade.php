@extends('layouts.app')

@section('content')
<div class="container">

  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">               

                <div class="card-header"> 
                    Create Poem
                      </div>

                <div class="card-body">

                <form action="/poems" method="post">

                    @csrf
                    <div class="form-group">
                      <label for="channel_id">Choose a channel:</label>
                      <select class="form-control" name="channel_id" id="channel_id">
                          <option value=""></option>
                          @foreach ($channels as $channel )

                        <option value="{{ $channel->id }}"{{ old('channel_id') == $channel->id ?'selected': '' }}>{{ $channel->name }}</option>
                            
                        @endforeach
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label > Title</label>
                      <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" aria-describedby="helpId" required>
                      <small id="helpId" class="text-muted">Write the name of the poem here.</small>
                    </div>
                    <div class="form-group">
                      <label >Author</label>
                      <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" aria-describedby="helpId" required>
                      <small id="helpId" class="text-muted">Write the author of the poem here.</small>
                    </div>
                    <div class="form-group">
                      <label >Location</label>
                      <small id="helpId" class="text-muted">Right click on the map below to select a location.</small>
                      <div id="map" style="width:100%;height:400px;">
                        <script>
                var markers = [];
                
                function myMap() {
                    var mapCanvas = document.getElementById("map");
                    var centre=new google.maps.LatLng(0, 0);
                    var mapOptions = {center: centre, zoom: 2};
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                    google.maps.event.addListener(map, 'rightclick', function(event) {
                      deleteMarkers();
                      placeMarker(map, event.latLng);
                      //set value of input fields
                      document.getElementById("lat").value = event.latLng.lat();
                      document.getElementById("lng").value = event.latLng.lng();
                    });
                }
                
                function setMapOnAll(map) {
                    for (var i = 0; i < markers.length; i++) {
                         markers[i].setMap(map);
                    }
                }
                
                function clearMarkers() {
                    setMapOnAll(null);
                }
                
                function deleteMarkers() {
                    clearMarkers();
                    markers = [];
                }

                function placeMarker(map, location) {
                    var marker = new google.maps.Marker({
                      position: location,
                      map: map
                    });
                    var infowindow = new google.maps.InfoWindow({
                        content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
                    });
                    infowindow.open(map,marker);
                    markers.push(marker);
                }   
                        </script>

                        <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW9FAJC34z2wKmGJJvW-QxF_ObdLfuzH4&callback=myMap">
                        </script>

                      </div>
                    </div>
                    <div class="form-group">
                      <label >Latitude</label>
                      <input type="text" name="lat" id="lat" class="form-control" value="{{ old('lat') }}" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label >Longitude</label>
                      <input type="text" name="lng" id="lng" class="form-control" value="{{ old('lng') }}" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label >Body</label>
                      <textarea class="form-control" name="body" id="body"  value="{{ old('body') }}" rows="5" required>{{ old('body') }}</textarea>
                    </div>
                    <div class="form-group">
                      <label >Poem language</label>
                      <input type="text" name="language" id="language" class="form-control" value="{{ old('language') }}" aria-describedby="helpId" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                    <hr>
                  
                    @include('layouts.errors')
                
                
                </form>


                </div>
            </div>                   
                                       
        </div>
    </div>

    <br>
         
</div>



</div>
@endsection
