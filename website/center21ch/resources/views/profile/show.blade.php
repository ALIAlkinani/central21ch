@extends('layouts.app')
@section('content')

 <div class="container">
       <div class="raw">
           <div class="col-md-8 col-md-offset-2">
                <div class="pageheader">
                    
                        <h2> {{ $profileUser->name }}  </h2>
                </div>

                @foreach ($activities as $date => $activity)
                    <h4 class="pageheader">{{ $date }}</h4>
                    <br>
                @foreach ($activity as $record)
            
                      @if(view()->exists("profile.activities.{$record->type}"))

                           @include("profile.activities.{$record->type}", ['activity'=>$record])
                          
                      @endif
                
                @endforeach            
                <br>
                    
                @endforeach
            
              {{--   {{ $poems->links() }} --}}
      </div>

                
           
</div>
    
@endsection
