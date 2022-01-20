
@extends('adminlte::page')

@section('title', 'Tercera edad')

@section('content_header')
    <h1>Personas de la tercera edad</h1>
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



<a href="{{url('anciano/create')}}" class="btn btn-outline-success">Registrar nueva persona</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#/{{$Numdatos = DB::table('ancianos')->count()}}</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Cédula</th>
            <th>Dirección</th>
            <th>Número de secuencia</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($ancianos as $anciano)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$anciano->nombre}}</td>
            <td>{{$anciano->contacto}}</td>
            <td>{{$anciano->cedula}}</td>
            <td>{{$anciano->direccion}}</td>
            <td>{{$anciano->num_secuencia}}</td>
            <td>
                <a href="{{url('/anciano/'.$anciano->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/anciano/'.$anciano->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$ancianos->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

