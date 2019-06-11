<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> 
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
        @csrf
    </div>

    <script type="text/javascript">
        const init = () => {
            "use strict"
            const mid = document.querySelector('#mid');

            document.querySelector('#toon').addEventListener('click', async () => {
                const select = document.querySelector('select');
                const formData = new FormData();
                formData.set( "productsoort", select.value );
                formData.set( "wattage", document.querySelector('#wattage').value );

                document.querySelector('h1').innerHTML = select.options[select.selectedIndex].innerHTML;

                const response = await fetch('lampen', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        "X-CSRF-Token": document.querySelector('input[name="_token"]').value
                    },
                }).then(data => data.json())
                .then(json => {
                    let r = "";
                    for (let i=0; i < json.length; i++) {
                        r += `<tr onclick="location.href='/product/${json[i].partnr}'"><td><img src="images/${json[i].partnr.replace(/\s+$/, '')}.png" /></td><td>${json[i].partnr}</td><td>${json[i].specs}</td><td>${(json[i].price).toFixed(2)}</td></tr>`;
                    }
                    mid.innerHTML = r;
                });
            });
        }
        document.addEventListener('DOMContentLoaded', init, false);
    </script>
</body>
</html>
