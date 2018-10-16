@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
@endsection

@section('content')
<poet-view :poet="{{ $poet }}" inline-template v-cloak>
<div class="container">
<div class="card">              
        <div class="card">
                    
                <avatar-poet :poet="{{ $poet}}"></avatar-poet>
        </div>

        @include('poets._content')    
                                       
        </div>
        
    </div>

</poet-view>
@endsection