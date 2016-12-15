@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Panel de usuarios</div>

                  <!-- Table -->
                  <table class="table">
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                      </tr>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
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
</div>
@endsection
