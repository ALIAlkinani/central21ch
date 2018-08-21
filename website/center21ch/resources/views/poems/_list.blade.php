@forelse ($poems as $poem)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="level">
                <div class="flex">
                    <h5>
                        <a href="{{ $poem->path() }}">
                            @if (auth()->check() && $poem->hasUpdatesFor(auth()->user()))
                                <strong>
                                    {{ $poem->title }}
                                </strong>
                            @else
                                {{ $poem->title }}
                            @endif
                        </a>
                    </h5>
                    <h6>
                        Posted By: <a href="{{ route('profile', $poem->creator) }}">{{ $poem->creator->name }}</a>
                    </h6>
                </div>
                <a href="{{ $poem->path() }}">
                    {{ $poem->replies_count }} {{ str_plural('reply', $poem->replies_count) }}
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="body">{{ $poem->body }}</div>
        </div>
        <br>
    </div>
@empty
    <p>There are no relevant results at this time.</p>

@endforelse 