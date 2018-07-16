@foreach ($replies as $reply)
   
       
                    
        <br>
        <div id="reply-{{ $reply->id }}" class="card">  
            
               
            <div class="card-header">
            
                <h5 class="flex"><a href="#"> {{ $reply->owner->name }}</a> said at
                    {{ $reply->created_at->diffForHumans() }}</h5>
                <div>
                    <favorite :reply="{{ $reply }}"></favorite>
                 
                    </div>
            </div>
            
            


    
            <div  class="card-body">
               <reply :attributes="{{ $reply }}">

               </reply>
               
                </div>
               
            
            
            @can('update', $reply)
    
                
            @endcan
    </div>    
        
    
        @endforeach   
        
    <div class="format-contoller">
        <br>
        {{ $replies->links() }}
    </div>


