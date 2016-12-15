@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Detalle de la consulta</div>

                <!-- Table -->
                <table class="table">

                  <tr>
                    <th>Nro. de consulta</th>
                    <td>{{ $query->id }}</td>
                  </tr>
                  <tr>
                    <th>Nombre</th>
                    <td>{{ $query->name }}</td>
                  </tr>
                  <tr>
                    <th>Apellido</th>
                    <td>{{ $query->lastName }}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{ $query->email }}</td>
                  </tr>
                  <tr>
                    <th>Consulta</th>
                    <td>{{ $query->queryContent }}</td>
                  </tr>
                  <tr>
                    <th>Creada</th>
                    <td>{{ $query->created_at }}</td>
                  </tr>
                  <tr>
                    <th><a href="/queries"><button type="submit">Volver</button></a></th>
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
