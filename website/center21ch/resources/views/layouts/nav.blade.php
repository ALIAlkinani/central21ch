

        <div class="col-md-12">
         <header class= "cleanfix">
            <section id="branding">
           
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
       
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Browse Poems <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/poems">Poems</a>
                                    
                                    <a href="/poems?popularity=1" class="dropdown-item">Popular poems</a>
                                    <a href="/poems?unanswered=1" class="dropdown-item">Unanswered</a>
                                    @if (auth()->check())
                                    <a class="dropdown-item" href="/poems?by={{ auth()->user()->name }}">My poems</a>

                                    @endif

                                   
                                </div>
                            </li>

                        
                        <li><a class="nav-link" href="/poems/create">Create Poem</a></li>
                        <li><a class="nav-link" href="/poets">Show Poets</a></li>
                        <li><a class="nav-link" href="/poets/create">Create Poet</a></li>
                       @include('layouts.dropDownMenu')


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                    <user_notification></user_notification>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('profile', Auth::User()) }}">
                                                              My Profile       </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        
    </nav>
    
</section>
</header>
</div>

