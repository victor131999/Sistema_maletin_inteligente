
@extends('adminlte::page')

@section('title', 'Gestión')

@section('content_header')
<h1 align="center">Crear Actividad</h1>
@stop

@section('content')
<form action="{{url('/actividad')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('actividad.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
