@extends('layouts.app')

@section('content')

  {{-- {{dd($product->genre()->genreTitle)}} --}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Modificar producto</div>
                <div class="panel-body">
                  @if (isset($ProductUpdateSuccess_Msj))
                    <p>
                      {{ $ProductUpdateSuccess_Msj }}
                    </p>
                  @endif
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('products', [$product->id]) }}">

                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $product->title }}" required autofocus>
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
                                <input id="author" type="text" class="form-control" name="author" value="{{ $product->author }}" required autofocus>
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
                                <input id="condition" type="text" class="form-control" name="condition" value="{{ $product->condition }}" required autofocus>
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
                                <input id="format" type="text" class="form-control" name="format" value="{{ $product->format }}" required autofocus>
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
                                <input id="publisher" type="text" class="form-control" name="publisher" value="{{ $product->publisher }}" required autofocus>
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
                                  @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ ($genre->id == $product->id) ? 'selected' : '' }}>
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
                                <input id="language" type="text" class="form-control" name="language" value="{{ $product->language }}" required autofocus>
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
                                <input id="isbn" type="text" class="form-control" name="isbn" value="{{ $product->isbn }}" required autofocus>
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
                                <textarea id="description" class="form-control" name="description" required autofocus>{{ $product->description }}</textarea>

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
                                <input id="price" type="text" class="form-control" name="price" value="{{ $product->price }}" required autofocus>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }}">
                            <label for="thumbnail" class="col-md-4 control-label">Imagen</label>

                            <div class="col-md-6">
                                <input id="thumbnail" type="file" class="form-control" name="thumbnail" value="@php echo asset('storage')@endphp/{{ $product->thumbnail }}" autofocus>
                                @if ($errors->has('thumbnail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('thumbnail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>

                    {{-- <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('updateProductImg') }}">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      <div class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }}">
                          <label for="thumbnail" class="col-md-4 control-label">Imagen</label>
                          <div class="col-md-6">
                              <input type="hidden" name="id" value="{{ $product->id }}">
                              <input id="thumbnail" type="file" class="form-control" name="thumbnail" required autofocus>
                              @if ($errors->has('thumbnail'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('thumbnail') }}</strong>
                                  </span>
                              @endif
                              <button type="submit" class="btn btn-primary">
                                  Actualizar imagen
                              </button>
                          </div>
                      </div>
                    </form> --}}

                </div>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
