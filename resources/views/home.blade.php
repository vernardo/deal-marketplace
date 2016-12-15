@extends('layouts.app')

<style>
  @media (min-width:768px) {
    .caption h4 {
      width: 301px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  }
  @media (min-width:992px) {
    .caption h4 {
      width: 146px;
    }
  }
  @media (min-width:1200px){
    .caption h4 {
      width: 191px;
    }
  }
</style>

@section('content')
  @if (Session::has('success'))
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
        <div id="charge-message" class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      </div>
    </div>
  @endif

    {{-- <div class="row"> --}}
        {{-- <div class="col-md-8 col-md-offset-2"> --}}
            <div class="panel panel-default">
                <div class="panel-heading">Menú de {{ Auth::user()->isAdmin ? 'administrador' : 'usuario' }}

                  @if (Auth::user()->isAdmin == false)
                  <div class="pull-right">
                    <form class="" action="/products-by-genre" method="get">
                      <select name="genre">
                          <option value="">Categoría</option>
                        @foreach ($genres as $genre)
                          <option value="{{ $genre->id }}">{{ $genre->genreTitle }}</option>
                        @endforeach
                      </select>
                      <button type="submit">Filtrar</button>
                    </form>
                  </div>
                  @endif

                </div>

                @if (Auth::user()->isAdmin)
                  <div class="panel-body col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                @else
                  <div class="panel-body">
                @endif
                  {{-- @foreach ($products as $product)
                    <div class="" style="height:160px;width:155px;">
                        <img src="" alt="" style="height:160px;">
                    </div>
                  @endforeach --}}

                  @if (Auth::user()->isAdmin)

                    <!-- Single button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuarios <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="/users">Ver usuarios</a></li>
                        {{-- <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li> --}}
                      </ul>
                    </div>

                    <!-- Single button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Consultas <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="/queries">Ver consultas</a></li>
                        {{-- <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li> --}}
                      </ul>
                    </div>

                    <!-- Single button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="/products">Ver productos</a></li>
                        {{-- <li><a href="#">Crear nuevo</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li> --}}
                      </ul>
                    </div>

                    <!-- Single button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Géneros <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="/genres">Ver géneros</a></li>
                        {{-- <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li> --}}
                      </ul>
                    </div>

                  @else

                    @foreach ($products->chunk(4) as $productChunk)
                      <div class="row">
                        @foreach ($productChunk as $product)

                          <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <img src="@php echo asset('storage');@endphp/./{{ $product->thumbnail }}" alt="Book Image" class="img-responsive" style="max-height:200px;">
                                <div class="caption">
                                    <h4>{{ $product->title }}</h4>
                                    <p class="author">{{ $product->author }}</p>
                                    <div class="clearfix">
                                        <div class="pull-left price" style="font-weight: bold;
                                        font-size: 16px;">${{$product->price}}</div>
                                        <a href="{{ route('product.addToCart', ['id' => $product->id ]) }}" class="btn btn-success pull-right" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                        <a href="./products/{{$product->id}}" class="btn btn-default pull-right" role="button" style="position:relative;right:5px;"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                          </div>

                          {{-- <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="thumbnail">
                              <img src="@php echo asset('storage');@endphp/./{{ $product->thumbnail }}" alt="Book Image" style="max-height:200px;">
                              <div class="caption">
                                <h4>{{ $product->title }}</h4>
                                <p>{{ $product->author }}</p>
                                <p>
                                  <a href="#" class="btn btn-primary" role="button">
                                    Carrito
                                  </a>
                                  <a href="./products/{{$product->id}}" class="btn btn-default" role="button"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </p>
                              </div>
                            </div>
                          </div> --}}

                        @endforeach
                      </div>
                    @endforeach
                    {{-- {{ $products->links() }} está dando un error --}} 
                  @endif
                </div>

            </div>
        </div>
    {{-- </div> --}}
@endsection
