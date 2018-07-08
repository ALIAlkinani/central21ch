
    @foreach ($replies as $reply)
        
    <br>
    <div class="card">   
        <div class="card-header">
          
            <h5 class="flex"><a href="#"> {{ $reply->owner->name }}</a> said at
                {{ $reply->created_at->diffForHumans() }}</h5>
             <div>
                    <form action="/replies/{{ $reply->id }}/favorites" method="post">
                        @csrf

                        <button type="submit" class="btn btn-info"{{ $reply->isFavorited() ? 'disabled' : ''}}{{ !auth()->check() ? 'disabled' : '' }}>
                            {{ $reply->favorites_count }}  
                            
                            {{ str_plural('Favirote',$reply->favorites_count ) }} </button>


                     </form>
                </div>
           </div>
        
        
                  


        <div class="card-body">
      {{$reply->body  }}

        </div>
 </div>    
    
   
    @endforeach   
    
   <div class="format-contoller">
       <br>
    {{ $replies->links() }}
   </div>
 