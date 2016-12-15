@extends('layouts.app')

@section('content')
  @if (Session::has('success'))
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div id="charge-message" class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      </div>
    </div>
  @endif
  <div class="panel panel-default">
    <div class="panel-heading">
      Productos
      <form class="" action="/products-by-genre" method="get">
        <select class="pull-right" name="genre">
            <option value="">Categoría</option>
          @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->genreTitle }}</option>
          @endforeach
        </select>
        <button type="submit" class="pull-right">Filtrar</button>
      </form>
    </div>
      <div class="panel-body">

        @unless (Auth::user())
            @include('partials.product-shelf')
        @endunless


      </div>
    </div>
  </div>
@endsection
