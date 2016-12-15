@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear nuevo género</div>
                <div class="panel-body">
                  @if (isset($GenreCreationSuccess_Msj))
                    <p>
                      {{ $GenreCreationSuccess_Msj }}
                    </p>
                  @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('genres') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('genreTitle') ? ' has-error' : '' }}">
                            <label for="genreTitle" class="col-md-4 control-label">Género</label>

                            <div class="col-md-6">
                                <input id="genreTitle" type="genreTitle" class="form-control" name="genreTitle" value="{{ old('genreTitle') }}" required autofocus>
                                @if ($errors->has('genreTitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Panel de géneros</div>
              @if(isset($GenreDeletionSuccess_Msj))
                <div class="panel-body">
                  <p>{{ $GenreDeletionSuccess_Msj }}</p>
                </div>
              @endif
                <!-- Table -->
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Género</th>
                      <th>Creado</th>
                      <th>Modificado</th>
                      <th></th>
                      <th></th>
                    </tr>
                  @foreach ($genres as $genre)
                    <tr>
                      <td>{{ $genre->id }}</td>
                      <td>{{ $genre->genreTitle }}</td>
                      <td>{{ $genre->created_at }}</td>
                      <td>{{ $genre->updated_at }}</td>
                      <td>
                        <a href="./genres/{{$genre->id}}/edit"><button type="submit" >Modificar</button></a>
                      </td>
                      <td>
                        <form class="" action="{{ url('genres', [$genre->id]) }}" method="post"> <!-- https://laravel.com/docs/5.3/helpers#method-url -->
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{ $genre->id }}">
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
    </div>
</div>
@endsection
