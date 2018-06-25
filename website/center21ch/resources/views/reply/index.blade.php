<div class="col-md-8">
    @foreach ($poem->replies as $reply)
        
   
    <div class="card">   
        <div class="card-header">
           <a href="#"> {{ $reply->owner->name }}</a> said at {{ $reply->created_at->diffForHumans() }}</div>            


        <div class="card-body">
      {{$reply->body  }}

        </div>
    </div>    
    
    <br>
    @endforeach                          
</div> 