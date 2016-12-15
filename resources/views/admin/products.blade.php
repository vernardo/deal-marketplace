@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script src="js/script.js"></script>
@endsection

@section('content')
<div class="container">
    {{-- <div class="row"> --}}
        <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="new_product_div">
                  <span class="ion-android-arrow-dropright" id="flechaDerecha"></span>
        					<span class="ion-android-arrow-dropdown" id="flechaAbajo"></span>
                  Crear nuevo producto
                </div>
                <div class="panel-body" id="new_product_form" style="display:none;">
                  @if (isset($ProductCreationSuccess_Msj))
                    <p>
                      {{ $ProductCreationSuccess_Msj }}
                    </p>
                  @endif
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('products') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Título</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                            <label for="author" class="col-md-4 control-label">Autor</label>
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" value="{{ old('author') }}" required autofocus>
                                @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('condition') ? ' has-error' : '' }}">
                            <label for="condition" class="col-md-4 control-label">Condición</label>
                            <div class="col-md-6">
                                <input id="condition" type="text" class="form-control" name="condition" value="{{ old('condition') }}" required autofocus>
                                @if ($errors->has('condition'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('condition') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('format') ? ' has-error' : '' }}">
                            <label for="format" class="col-md-4 control-label">Formato</label>
                            <div class="col-md-6">
                                <input id="format" type="text" class="form-control" name="format" value="{{ old('format') }}" required autofocus>
                                @if ($errors->has('format'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('format') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                            <label for="publisher" class="col-md-4 control-label">Editorial</label>
                            <div class="col-md-6">
                                <input id="publisher" type="text" class="form-control" name="publisher" value="{{ old('publisher') }}" required autofocus>
                                @if ($errors->has('publisher'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publisher') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('genre_id') ? ' has-error' : '' }}">
                            <label for="genre_id" class="col-md-4 control-label">Género</label>
                            <div class="col-md-6">
                              <select id="genre_id" class="form-control" name="genre_id" required autofocus>
                                <option value="">Elegir</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">
                                  {{ $genre->genreTitle }}
                                </option>
                                @endforeach
                              </select>
                              @if ($errors->has('genre_id'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('genre_id') }}</strong>
                                </span>
                              @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                            <label for="language" class="col-md-4 control-label">Idioma</label>
                            <div class="col-md-6">
                                <input id="language" type="text" class="form-control" name="language" value="{{ old('language') }}" required autofocus>
                                @if ($errors->has('language'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('isbn') ? ' has-error' : '' }}">
                            <label for="isbn" class="col-md-4 control-label">ISBN</label>
                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" required autofocus>
                                @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Precio</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required autofocus>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }}">
                            <label for="thumbnail" class="col-md-4 control-label">Imagen</label>
                            <div class="col-md-6">
                                <input id="thumbnail" type="file" class="form-control" name="thumbnail" value="{{ old('thumbnail') }}" required autofocus>
                                @if ($errors->has('thumbnail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('thumbnail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="crearProducto">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Panel de productos</div>
              @if(isset($ProductDeletionSuccess_Msj))
                <div class="panel-body">
                  <p>{{ $ProductDeletionSuccess_Msj }}</p>
                </div>
              @endif
              {{-- @if (session('$ProductDeletionSuccess_Msj'))
                <div class="panel-body">
                  <p>{{ session('$ProductDeletionSuccess_Msj') }}</p>
                </div>
              @endif --}}
                <!-- Table -->
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Título</th>
                      <th>Autor</th>
                      {{-- <th>Condición</th>
                      <th>Formato</th> --}}
                      <th>Género</th>
                      {{-- <th>Idioma</th>
                      <th>Editorial</th> --}}
                      <th>ISBN</th>
                      {{-- <th>Descripción</th> --}}
                      <th>Imagen</th>
                      <th>Precio</th>
                      {{-- <th>Publicado</th>
                      <th>Modificado</th> --}}
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->title }}</td>
                      <td>{{ $product->author }}</td>
                      {{-- <td>{{ $product->condition }}</td>
                      <td>{{ $product->format }}</td> --}}
                      <td>{{ $product->genre->genreTitle }}</td>{{-- Acá use RELACIONES --}}
                      {{-- <td>{{ $product->language }}</td>
                      <td>{{ $product->publisher }}</td> --}}
                      <td>{{ $product->isbn }}</td>
                      {{-- <td>{{ $product->description }}</td> --}}
                      {{-- <td>{{ $product->thumbnail }}</td> --}}
                      <td><img src="@php echo asset('storage');@endphp/./{{ $product->thumbnail }}" alt="Book Image" class="img-responsive" style="max-height:75px;"></td>
                      <td>{{ $product->price }}</td>
                      {{-- <td>{{ $product->created_at }}</td>
                      <td>{{ $product->updated_at }}</td> --}}
                      <td>
                        <a href="/products/{{$product->id}}/edit"><button type="submit" >Modificar</button></a>
                      </td>
                      <td>
                        <form class="" action="{{ url('products', [$product->id]) }}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{ $product->id }}">
                          <button type="submit" name="button">Pausar</button>
                        </form>
                      </td>
                      <td>
                        <form class="" action="{{ url('products', [$product->id]) }}" method="post">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{ $product->id }}">
                          <button type="submit" name="button">Eliminar</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                    <tr>
                      <td colspan="7"><a href="/home"><button type="submit">Ir al menú principal</button></a></td>
                    </tr>
                </table>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection
