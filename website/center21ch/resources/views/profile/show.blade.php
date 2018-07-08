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
                @foreach ($activity as $record)
                @include("profile.activities.{$record->type}", ['activity'=>$record])
                    
                @endforeach

                
            
                    
                @endforeach
            
              {{--   {{ $poems->links() }} --}}
      </div>

                
           
</div>
    
@endsection
