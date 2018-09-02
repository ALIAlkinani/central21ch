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
                      <small id="helpId" class="text-muted">Select a location from the map below.</small>
                      <div id="map" style="width:100%;height:400px;">
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

                      </div>
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
