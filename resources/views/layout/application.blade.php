<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <link href="/css/welcome.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{  action('ClientController@index') }}">
                        IT Management
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li><a href="{{ action('ContractController@index') }}">Contratos</a></li>
                        {{--<li><a href="{{ action('ProjectController@index') }}">Projetos</a></li>--}}
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Registrar</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
        <footer class="footer">
            <p>© Larastock.</p>
        </footer>
        <script src="js/app.js" type="text/javascript"></script>
    </body>
</html>
