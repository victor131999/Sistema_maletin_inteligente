
@extends('adminlte::page')

@section('title', 'Actividades')

@section('content_header')
    <h1>Actividades</h1>
@stop

@section('content')


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session('status'))
            @if(session('status')=='1')
                <div class = "alert alert-success">
                    La actividad fue guardada con exito
                </div>
            @else
                <div class = "alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        @endif


<a href="{{url('actividad/create')}}" class="btn btn-outline-success">Registrar actividad</a>
<br/>
  <input class="form-control" id="search" type="text" placeholder="Search..">
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#/{{$Numdatos = DB::table('actividas')->count()}}</th>
            <th>Paciente</th>
            <th>Responsable</th>
            <th>Descripción</th>
            <th>Fecha de registro</th>
            <th>Fecha de sistema</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody id="myTable">

        @foreach ($actividas as $activida)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$activida->anciano->nombre}} </td>
            <td>{{$activida->responsable->name}} </td>
            <td>{{$activida->descripcion}} </td>
            <td>{{$activida->fecha}}</td>
            <td>{{$activida->created_at}}</td>
            <td>
                <a href="{{url('/actividad/'.$activida->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>
                |
                <!--<a href="{{url('/actividad/'.$activida->id.'/edit')}}" class="btn btn-outline-info">Editar</a>-->

                <form action="{{url('/actividad/'.$activida->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$actividas->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script> $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
@stop

