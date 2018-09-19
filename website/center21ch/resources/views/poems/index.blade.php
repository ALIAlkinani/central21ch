
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                
                    <div class="form-group">
                           
                            <show-map ></show-map>
                </div>

                @include ('poems._list')
                <br>

                {{ $poems->render() }}
               
            </div>

            <div class="col-md-4">
                @if (count($trending))
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">
                            Trending Poems
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($trending as $poem)
                                    <li class="list-group-item">
                                        <a href="{{ url($poem->path) }}">
                                            {{ $poem->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        

    </div>
@endsection