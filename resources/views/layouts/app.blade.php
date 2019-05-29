<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bets') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .btn-info {
            color: white;
        }
    </style>

    @yield('css')
</head>
<body>
    <div id="app">
        @include('partials.navbar')

        <main class="py-4">
            
            @auth
                <div class="container">
                    @include('partials.alerts')
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group">
                                @if (auth()->user()->is_admin)
                                    <li class="list-group-item">
                                        <a href="{{ route('users.index') }}">Users</a>
                                    </li>
                                @endif
                                <li class="list-group-item"><a href="{{ route('results.index') }}">Results</a></li>
                                <li class="list-group-item"><a href="{{ route('lotteries.index') }}">Lotteries</a></li>
                                <li class="list-group-item"><a href="{{ route('times.index') }}">Times</a></li>
                            </ul>
                            <ul class="list-group mt-5 mb-4">
                                <li class="list-group-item"><a href="{{ route('trashed-lotteries.index') }}">Trashed Lotteries</a></li>
                                <li class="list-group-item"><a href="{{ route('trashed-times.index') }}">Trashed Times</a></li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            @endauth
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
