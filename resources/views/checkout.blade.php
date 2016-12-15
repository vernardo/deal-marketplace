@extends('layouts.app')

@section('title')
  DalmiBooks
@endsection

@section('content')
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
      <h1>Checkout</h1>
      <h4>Tu Total: ${{ $total }}</h4>
      <form action="{{ route('checkout') }}" method="post" id="checkout-form"> {{-- Los inputs de este form no tiene atributos 'name' porque sus valores serán capturados con JavaScript en lugar de ser mandados al servidor --}}
        {{-- <p>Ya recibimos tu orden. Contactanos a <strong>ventas@dalmiboks.com</strong> para acordar los medios de pago y envío.</p>
        <p>También podés consultar las mismas en <a href="/myOrders/{{ Auth::user()->id }}"><i class="fa fa-credit-card" aria-hidden="true"></i> Mis compras</a></p> --}}

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" id="name" class="form-control" required name="name">
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group">
              <label for="lastName">Apellido</label>
              <input type="text" id="lastName" class="form-control" required name="lastName">
            </div>
          </div>
          {{-- <div class="col-xs-12">
            <div class="form-group">
              <label for="address">Dirección</label>
              <input type="text" id="address" class="form-control" required name="address">
            </div>
          </div> --}}
          <hr>
          <div class="col-xs-12">
            <div class="form-group">
              <label for="card-name">Titular de la tarjeta de crédito</label>
              <input type="text" id="card-name" class="form-control" required>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group">
              <label for="card-number">Número de la tarjeta de crédito</label>
              <input type="text" id="card-number" class="form-control" required>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="card-expiry-month">Mes de expiración</label>
                  <input type="text" id="card-expiry-month" class="form-control" placeholder="MM" required>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="card-expiry-year">Año de expiración</label>
                  <input type="text" id="card-expiry-year" class="form-control" placeholder="AAAA" required>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group">
              <label for="card-vc">Código de seguridad</label>
              <input type="text" id="card-vc" class="form-control" required>
            </div>
          </div>
        </div>
        {{ csrf_field() }} {{-- seguimos teniendo que validar la info de sesión del usuario --}}
        <button type="submit" class="btn btn-success">Confirmar compra</button>
      </form>
    </div>
  </div
@endsection
