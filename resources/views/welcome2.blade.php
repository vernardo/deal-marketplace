<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DalmiBooks</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Registro</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    DalmiBooks
                    {{-- <img src="img/Logo-Original-Web.png" alt="logo" /> --}}
                </div>

                <div class="links">
                    <a href="">Catálogo</a>
                    <a href="">Novedades</a>
                    <a href="">Ofertas</a>
                    <a href="">Nosotros</a>
                    <a href="{{ route('queries.create') }}">Contacto</a>
                </div>
            </div>
        </div>
    </body>
</html>


{{-- @extends('layouts.app')

@section('content')

  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Palabras clave">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Buscar</button>
      </span>
    </div>
  </div>

<div class="col-md-8 col-md-offset-2">
  <div class="panel-body">

    @foreach (App\Product::all()->chunk(3) as $productChunk)

      <div class="row">

        @foreach ($productChunk as $product)

          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="@php echo asset('storage');@endphp/./{{ $product->thumbnail }}" alt="Book Image" style="max-height: 200px">
              <div class="caption">
                <h4>{{ $product->title }}</h4>
                <p>{{ $product->author }}</p>
                <p>
                  <a href="#" class="btn btn-success" role="button">

                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                  </a>
                  <a href="./products/{{$product->id}}" class="btn btn-default" role="button">Detalle</a>
                </p>
              </div>
            </div>
          </div>

        @endforeach

    </div>
  @endforeach
  </div>
</div>

@endsection --}}
