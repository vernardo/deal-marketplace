@extends('layouts.app')

@section('title')
  DalmiBooks
@endsection

@section('content')
  @if (Session::has('cart'))
    <div class="row">
      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <ul class="list-group">
          @foreach ($products as $product) {{--  '$product' es lo mismo que '$item' en el carrito --}}
            <li class="list-group-item">
              <span class="badge">{{ $product['qty'] }}</span> {{-- Obs: los badges de bootstrap siempre se flotean a la derecha --}}
              <strong>{{ $product['item']['title'] }}</strong>
              <span class="label label-success">${{ $product['price'] }}</span>
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                  Action
                  <span class="caret"></span> {{-- class="caret" genera la flechita hacia abajo para que el user entienda que es un dropdown button --}}
                </button> {{-- 'data-toogle' es un atributo de bootstrap --}}
                <ul class="dropdown-menu"> {{-- el dropdown per se --}}
                  <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Quitar 1</a></li>
                  <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Quitar todos</a></li>
                </ul>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>Total: ${{ $totalPrice }}</strong>
      </div>
    </div>
    <hr> {{-- línea horizontal --}}
    <div class="row">
      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
      </div>
    </div>
  @else
    <div class="row">
      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <h2>No hay productos en el carrito.</h2>
      </div>
    </div>
  @endif
@endsection
