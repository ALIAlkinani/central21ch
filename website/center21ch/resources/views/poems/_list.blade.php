@forelse ($poems as $poem)
    <div class="card text-white bg-dark mb-3">
        <div class="card-header">
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
        <div class="card-body">
            <div class="body">{!! $poem->body !!}</div>
        </div>
    <div class="card-footer">
      {{ $poem->visits }}  visits 
    </div>
        <br>
    </div>
@empty
    <p>There are no relevant results at this time.</p>

@endforelse 