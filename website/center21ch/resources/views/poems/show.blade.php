@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
@endsection

@section('content')
    <poem-view :poem="{{ $poem }}" inline-template v-cloak>
        <div class="container">
            <div class="row">
                <div class="col-md-8" >
                   @include('poems._content')

                    <replies @added="repliesCount++" @removed="repliesCount--"></replies>
                </div>

                <div class="col-md-4">
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <p>
                                This poem was published {{ $poem->created_at->diffForHumans() }} by
                                <a href="#">{{ $poem->creator->name }}</a>, and currently
                                has <span
                                        v-text="repliesCount"></span> {{ str_plural('comment', $poem->replies_count) }}
                                .
                            </p>

                            <p class="level">
                                <span v-if="!authorize('owns', poem)">  <subscribe-button :active="{{ json_encode($poem->isSubscribedTo) }}" v-if="signedIn"></subscribe-button></span>
                               

                                <button   class="btn ml-a" :class="!locked ? 'btn-outline-success': 'btn-outline-danger '"
                                        v-if="authorize('isAdmin')"
                                        @click="toggleLock">
                                         
                                       <p v-if="locked" >
                                            <font-awesome-icon icon="lock" />
                                        </p> 
                                        
                                        <p v-else>
                                                <font-awesome-icon  icon="unlock" />
                                        </p>
                                        
                                      
                                    </button>
                            </p>
                        </div>
                    </div>
                    <translates :data="{{$poem->translates}}"></translates>
                </div>
            </div>
        </div>
    </poem-view>
@endsection