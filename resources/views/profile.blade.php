@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Perfil</div>

                <!-- Table -->
                <table class="table">

                  <tr>
                    <th>Nombre</th>
                    <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                    <th>Apellido</th>
                    <td>{{ $user->lastName }}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <th>Teléfono</th>
                    <td>{{ $user->phone }}</td>
                  </tr>
                  <tr>
                    <th colspan="2">
                      <a href="/home"><button type="submit">Ir al menú principal</button></a>
                    </th>
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
