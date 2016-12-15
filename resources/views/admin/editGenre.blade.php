@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Modificar género</div>
                <div class="panel-body">
                  @if (isset($GenreUpdateSuccess_Msj))
                    <p>
                      {{ $GenreUpdateSuccess_Msj }}
                    </p>
                  @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('genres', [$genre->id]) }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('genreTitle') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Género</label>

                            <div class="col-md-6">
                                <input id="genreTitle" type="text" class="form-control" name="genreTitle" value="{{ $genre->genreTitle }}" required autofocus>
                                @if ($errors->has('genreTitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('genreTitle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
