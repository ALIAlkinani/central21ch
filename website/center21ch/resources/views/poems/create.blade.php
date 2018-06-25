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
                      <label > Title</label>
                      <input type="text" name="title" id="title" class="form-control"  aria-describedby="helpId">
                      <small id="helpId" class="text-muted">You can write the title of the poem</small>
                    </div>
                    <div class="form-group">
                      <label >Body</label>
                      <textarea class="form-control" name="body" id="body" rows="5"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                
                
                </form>


                </div>
            </div>                   
                                       
        </div>
    </div>

    <br>
         
</div>



</div>
@endsection
