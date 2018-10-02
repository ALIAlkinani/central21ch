<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css">
    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>
    
        <style>
            body { padding-bottom: 100px; }
            .level { display: flex; align-items: center; }
            .flex { flex: 1; }
            .mr-1 { margin-right: 1em; }
            .ml-1 { margin-left: 1em; }
            [v-cloak] { display: none; }
            .ml-a{margin-left: auto;}
            .level-item { margin-right: 1em; }
            footer{
                height: 200px;
            }
        </style>
    @yield('head')
</head>
<body>
    <div id="app">
       @include('layouts.nav')  


        <main class="py-4">
            @yield('content')
        </main>
        <flash message="{{ session('flash') }}"></flash>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}">    </script>
   
  <footer>
  </footer>
    
</body>

</html>
