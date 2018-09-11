@component('profile.activities.activity')
@slot('heading')

<h5 class="flex">
                {{ $profileUser->name }} create Poem  <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
                
        
        </h5>
        {{ $profileUser->created_at->diffforHumans() }}
    
@endslot


@slot('body')

{!! $activity->subject->body !!}
    
@endslot
    
@endcomponent

                