@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contacto</div>
                <div class="panel-body">
                  @if (isset($querySuccess_Msj))
                    <p>
                      {{ $querySuccess_Msj }}
                    </p>
                    <a href="/home"><button type="submit">Ir al menú principal</button></a>
                    <a href="/queries/create"><button type="submit">Hacer otra consulta</button></a>
                  @else
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('queries') }}">
                        {{ csrf_field() }}

                        <!-- use Illuminate\Support\Facades\Auth; ?????????????????-->
                        @php
                          // https://laravel.com/docs/5.3/authentication#retrieving-the-authenticated-user
                          //use Illuminate\Support\Facades\Auth;
                        @endphp
                        <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::id() : null }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> --}}
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::check() ? Auth::user()->name : old('name') }}" {{ Auth::check() ? "readonly" : "" }} required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <label for="lastName" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                {{-- <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required autofocus> --}}
                                <input id="lastName" type="text" class="form-control" name="lastName" value="{{ Auth::check() ? Auth::user()->lastName : old('lastName') }}" {{ Auth::check() ? "readonly" : "" }} required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                {{-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> --}}
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::check() ? Auth::user()->email : old('email') }}" {{ Auth::check() ? "readonly" : "" }} required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('queryContent') ? ' has-error' : '' }}">
                            <label for="queryContent" class="col-md-4 control-label">Consulta</label>

                            <div class="col-md-6">
                                <textarea id="queryContent" class="form-control" name="queryContent" value="{{ old('queryContent') }}" required autofocus></textarea>

                                @if ($errors->has('queryContent'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('queryContent') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
