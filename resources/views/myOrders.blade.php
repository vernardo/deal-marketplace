@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2>Mis compras</h2>
      @foreach ($userOrders as $order)

      <div class="panel panel-default">
        <div class="panel-heading">Nº de orden: {{ $order->id }}</div>
        <div class="panel-body">
          <ul class="list-group">
            @foreach ($order->cart->items as $item)
              <li class="list-group-item">
                <span class="badge">${{ $item['price'] }}</span> {{-- $item es un array asoc, no un objeto --}}
                <i>{{ $item['item']['title'] }}</i> | {{ $item['qty'] }} unidades
              </li>
            @endforeach
          </ul>
        </div>
        <div class="panel-footer">
          <strong>Total: ${{ $order->cart->totalPrice }}</strong>
        </div>
              {{-- <div class="panel-heading">Mis compras</div>

                <!-- Table -->
                <table class="table">
                    <tr>
                      <th>Fecha</th>
                      <th>Nro de orden</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                  @foreach ($userOrders as $order)
                    <tr>
                      <td>{{ $order->created_at }}</td>
                      <td>{{ $order->sameOrder_id }}</td>
                      <td>{{ $order->product_id }}</td>
                      <td>{{ $order->quantity }}</td>
                      <td>{{ $order->subtotal }}</td>
                      <td>
                        <a href="/home"><button type="submit" >Ir al menú principal</button></a>
                      </td>
                    </tr>
                  @endforeach
                </table>--}}
      </div>
      @endforeach
    </div>
  </div>
@endsection
