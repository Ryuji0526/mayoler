<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts._head')
<body>
    <div id="app">
        @include('layouts._headerNav')
        <div class="container-fluid">
            <div class="row justify-content-center">
                @include('layouts._sideNav')
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