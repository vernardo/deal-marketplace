@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Panel de consultas</div>

                <!-- Table -->
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Consulta</th>
                      <th>Creada</th>
                      <th></th>
                      {{-- <th>Modificada</th> --}}
                    </tr>
                  @foreach ($queries as $query)
                    <tr>
                      <td>{{ $query->id }}</td>
                      <td>{{ $query->name }}</td>
                      <td>{{ $query->lastName }}</td>
                      <td>{{ $query->email }}</td>
                      <td><div style="width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                        {{ $query->queryContent }}
                      </div></td>
                      {{-- <td style="white-space: nowrap;width: 12em;overflow: hidden;text-overflow: ellipsis;">{{ $query->queryContent }}</td> --}}
                      <td>{{ $query->created_at }}</td>
                      {{-- <td>{{ $query->updated_at }}</td> --}}
                      <td>
                        <a href="./queries/{{$query->id}}"><button type="submit" >Detalle</button></a>
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
