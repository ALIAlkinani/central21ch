
@extends('layouts.app')

@section('content')
<section class="container">
 
        <show-map></show-map>
          <div class=" row">
            <section class="main col col-lg-8">
           
            
                    @include ('poems._list')
                    <br>
    
                   <div class=" pagination justify-content-center " style="margin-top:40px">
                                {{ $poems->render() }}
                   </div>
            </section><!--main-->
            <section class="sidebar col col-lg-4">
          
                    @if (count($trending))
                    <aside class="Trending ">
                          <h2>Trending Poems</h2>  
                          <div id="list2">
                                <ol>
                                        @foreach ($trending as $poem)
                                   <li><p><em> </em> <a href="{{ url($poem->path) }}">
                                        {{ $poem->title }}
                                    </a></p></li>
                                    @endforeach
                                </ol>
                             </div>
                   
                         
                                   
                                       
                                    
                             @include('poets.snippet_poetphotogrid')  
                             <br> 
                             @include('poets.translate')   
                        </div>
                       
                    </div>
                @endif

               
            </section><!--sidebar-->
      
           </div><!-- container -->
         
        </section><!-- container -->
      
@endsection