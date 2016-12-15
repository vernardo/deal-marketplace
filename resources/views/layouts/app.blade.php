<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DalmiBooks') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ URL::to('css/style.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @yield('styles')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img id="brand-image" alt="Logo" src="img/logo.png" style="position:absolute;top:3px;">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">


                        <li>
                          <a href="{{ route('faq') }}"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Acerca</a>
                        </li>
                      @if (Auth::guest() || Auth::user()->isAdmin == false)
                        <li>
                          <a href="{{ route('product.shoppingCart') }}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito
                            <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                          </a>
                        </li>
                      @endif

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user() ? Auth::user()->name : 'Cuenta' }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">

                          @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Entrar</a></li>
                            <li><a href="{{ url('/register') }}">Registrarme</a></li>
                          @endif

                          @if (Auth::user() && Auth::user()->isAdmin == false)
                            <li><a href="/myOrders/{{ Auth::user()->id }}"><i class="fa fa-credit-card" aria-hidden="true"></i> Mis compras</a></li>
                            <li><a href="{{ url('/queries/create') }}"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contacto</a></li>
                          @endif

                          @if (Auth::user())
                            <li><a href="{{ url('/users', [Auth::user()->id] ) }}"><i class="fa fa-user" aria-hidden="true"></i> Mis datos</a></li>
                            <li>
                              <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                              </a>
                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                              </form>
                            </li>
                          @endif

                        </ul>
                      </li>
                    </ul>
                </div>
            </div>
        </nav>

      <div class="container">
        @yield('content')
      </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
