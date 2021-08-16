<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title . ' | ' : '' }}Mayoler</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    MAYOLER
                </a>
                <ul class="navbar-nav ml-auto d-md-flex d-none">
                    @guest
                        @if (Route::has('front.login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('front.register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.with_mayos.create') }}">{{ __('魅力を伝える(投稿)') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('front.users.show', Auth::id()) }}">{{ __('Profile') }}</a>
                                <a class="dropdown-item" href="{{ route('front.logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('front.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <nav class="col-3 d-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            @guest
                                @if (Route::has('front.login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('front.login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                @if (Route::has('front.register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('front.register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <h6 class="sidebar-heading mx-3 mt-3">{{ Auth::user()->name }}</h6>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.with_mayos.create') }}">{{ __('魅力を伝える') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.users.show', Auth::id()) }}">{{ __('Profile') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('front.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
                <main class="py-4 col-9">
                    <x-front.alert />
                    <div class="card">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
