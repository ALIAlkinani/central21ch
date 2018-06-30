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
                          <option value="">Choose One .....</option>
                          @foreach ($channels as $channel )

                        <option value="{{ $channel->id }}"{{ old('channel_id') == $channel->id ?'selected': '' }}>{{ $channel->name }}</option>
                            
                        @endforeach
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label > Title</label>
                      <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" aria-describedby="helpId" required>
                      <small id="helpId" class="text-muted">You can write the title of the poem</small>
                    </div>
                    <div class="form-group">
                      <label >Body</label>
                      <textarea class="form-control" name="body" id="body"  value="{{ old('body') }}" rows="5" required>{{ old('body') }}</textarea>
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
