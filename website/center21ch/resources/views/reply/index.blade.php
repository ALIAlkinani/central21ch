
    @foreach ($replies as $reply)
        
    <br>
    <div class="card format-controller">   
        <div class="card-header">
           <a href="#"> {{ $reply->owner->name }}</a> said at
            {{ $reply->created_at->diffForHumans() }}</div>            


        <div class="card-body">
      {{$reply->body  }}

        </div>
    </div>    
    
   
    @endforeach   
    
   <div class="format-contoller">
       <br>
    {{ $replies->links() }}
   </div>
 