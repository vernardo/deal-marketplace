@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Detalle del producto</div>

                <!-- Table -->
                <table class="table">

                  <tr>
                    {{-- <th>Imagen</th> --}}
                    <td colspan="2"><img src="@php echo asset('storage');@endphp/./{{ $product->thumbnail }}" alt="Book Image" id="product-detail"></td>
                  </tr>
                  <tr>
                    <th>Título</th>
                    <td>{{ $product->title }}</td>
                  </tr>
                  <tr>
                    <th>Autor</th>
                    <td>{{ $product->author }}</td>
                  </tr>
                  <tr>
                    <th>Condición</th>
                    <td>{{ $product->condition }}</td>
                  </tr>
                  <tr>
                    <th>Formato</th>
                    <td>{{ $product->format }}</td>
                  </tr>
                  <tr>
                    <th>Editorial</th>
                    <td>{{ $product->publisher }}</td>
                  </tr>
                  <tr>
                    <th>Género</th>
                    <td>{{ $product->genre->genreTitle }}</td>{{-- Acá use RELACIONES --}}
                  </tr>
                  <tr>
                    <th>Idioma</th>
                    <td>{{ $product->language }}</td>
                  </tr>
                  <tr>
                    <th>ISBN</th>
                    <td>{{ $product->isbn }}</td>
                  </tr>
                  <tr>
                    {{-- <th>Descripción</th> --}}
                    <td colspan="2"><b>Descripción:</b> {{ $product->description }}</td>
                  </tr>
                  <tr>
                    <th>Precio</th>
                    <td>{{ $product->price }}</td>
                  </tr>
                  <tr>
                    <th>
                      <div class="clearfix">
                        <a href="{{ route('product.addToCart', ['id' => $product->id ]) }}" style="position:relative;left:5px;" class="btn btn-success pull-right" role="button">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        </a>
                        <a href="/" class="btn btn-default" role="button">
                          <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                      </div>
                    </th>
                    <td></td>
                  </tr>

                    {{-- <td>
                      <a href="./queries/{{$query->id}}"><button type="submit">Detalle</button></a>
                    </td>
                  </tr> --}}

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
