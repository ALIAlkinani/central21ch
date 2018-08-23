@extends('layouts.app')
@section('content')

 <div class="container">
       <div class="raw">
           <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    
                        <avatar-form :user="{{ $profileUser }}"></avatar-form>
                </div>
                <div>
{{--                     <img src="{{ $profileUser->avatar_path }}" alt="" width="100" height="100">
 --}}                </div>

                @forelse($activities as $date => $activity)
                    <h4 class="pageheader">{{ $date }}</h4>
                    <br>
                @foreach ($activity as $record)
            
                      @if(view()->exists("profile.activities.{$record->type}"))

                           @include("profile.activities.{$record->type}", ['activity'=>$record])
                          
                      @endif
                
                @endforeach            
                <br>
                    
                @empty
                    <p>The user do not have any activities until now</p>
                @endforelse
            
              {{--   {{ $poems->links() }} --}}
      </div>

                
           
</div>
    
@endsection
