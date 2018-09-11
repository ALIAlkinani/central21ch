@component('profile.activities.activity')
@slot('heading')

<h5 class="flex">
               
<a href="{{ $activity->subject->favorited->path() }}"> {{ $profileUser->name }} Favorite Reply </a> 
                 
        
        </h5>
    
    
@endslot

@slot('body')
{!!  $activity->subject->favorited->body !!}  
 
@endslot
    
@endcomponent

                