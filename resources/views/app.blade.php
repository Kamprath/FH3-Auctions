<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

        @yield('head')
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="app">
            <nav class="navbar is-secondary">
                <div class="navbar-brand">
                    <span class="navbar-item" href="https://bulma.io">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuz3LXMcTJCWPKG_TBAt6F9mEfUnik7s7ReD2iMtF_mOJvy9X1" alt="Forza">
                    </span>
                    <div class="navbar-burger burger" data-target="navMenuColordark-example">
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div id="navMenuColordark-example" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item{{ Route::currentRouteName() === 'auctions.index' ? ' is-active' : '' }}" href="{{ route('auctions.index') }}">Auctions</a>
                        <a class="navbar-item{{ Route::currentRouteName() === 'cars.index' ? ' is-active' : '' }}" href="{{ route('cars.index') }}">Cars</a>
                    </div>
                </div>
            </nav>
            <div class="content">
                @yield('content')
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
