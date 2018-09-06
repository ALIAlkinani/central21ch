{{-- Editing the content. --}}
<div class="card card-default" v-if="editing">
    <div class="card-heading">
        <div class="level">
            <input type="text" class="form-control" v-model="form.title">
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">
            <textarea class="form-control" rows="10" v-model="form.body"></textarea>
        </div>
    </div>

    <div class="footer">
        <div class="level">
            <button class="btn btn-xs level-item" @click="editing = true" v-show="! editing">Edit</button>
            <button class="btn btn-primary btn-xs level-item" @click="update">Update</button>
            <button class="btn btn-xs level-item" @click="resetForm">Cancel</button>

            @can ('update', $poem)
                <form action="{{ $poem->path() }}" method="POST" class="ml-a">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-link">Delete Poem</button>
                </form>
            @endcan

        </div>
    </div>
    <br>
</div>


{{-- Viewing the content. --}}
<div class="card card-default" v-else>
    <div class="card-heading">
        <div class="level">
            <img src="{{ $poem->creator->avatar_path }}"
                 alt="{{ $poem->creator->name }}"
                 width="25"
                 height="25"
                 class="mr-1">

            <span class="flex">
                <a href="{{ route('profile', $poem->creator) }}">{{ $poem->creator->name }}</a> posted: <span v-text="title"></span>
            </span>
        </div>
    </div>

    <div class="card-body" v-text="body"></div>

    <div class="footer" v-if="authorize('owns', poem)">
        <button class="btn btn-xs" @click="editing = true">Edit</button>

    </div>
    <br>
</div>