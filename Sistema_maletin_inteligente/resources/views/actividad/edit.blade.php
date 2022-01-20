@extends('adminlte::page')

@section('title', 'Gestión')

@section('content_header')
<h1 align="center">Editar datos</h1>
@stop

@section('content')
<form action="{{url('/actividad/'.$actividad->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('actividad.form',['modo'=>'Editar '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
