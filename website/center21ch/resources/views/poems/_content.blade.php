{{-- Editing the content. --}}
<div class="card card-default" v-if="editing">
    <div class="card-heading">
        <div class="level">
            <input type="text" class="form-control" v-model="form.title">
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">
                <wysiwyg v-model="form.body"></wysiwyg>
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

            <span class="flex" >
                <a href="{{ route('profile', $poem->creator) }}">{{ $poem->creator->name }}</a> posted: <span v-text="title"></span>
            </span>
            <button class=" btn btn-primary btn-xs mr-1" type="button"  data-toggle="modal" data-target="#createTranslate"> Add Translate</button>
        </div>
                <!-- Modal -->
        <div class="modal fade" id="createTranslate" tabindex="-1" role="dialog" aria-labelledby="createTranslateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTranslateLabel" v-text="title" ></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            
            
            <div class="modal-body">
                 
                <new-translate></new-translate>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
            </div>
        </form>
            
           
            </div>
        </div>
        </div>
    </div>

    <div class="card-body" v-html="body"></div>

    <div class="footer" v-if="authorize('owns', poem)">
        <button class="btn btn-xs" @click="editing = true">Edit</button>

    </div>
    <br>
</div>
