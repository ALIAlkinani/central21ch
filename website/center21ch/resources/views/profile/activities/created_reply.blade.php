@component('profile.activities.activity')
@slot('heading')
<h5 class="flex">
        {{ $profileUser->name }} create reply to <a href="{{ $activity->subject->poem->path() }}">{{ $activity->subject->poem->title }}</a>
</h5>
{{ $profileUser->created_at->diffforHumans() }}
    
@endslot

@slot('body')
    
@endslot
@slot('body')

{{ $activity->subject->body }}
    
@endslot
    
@endcomponent
