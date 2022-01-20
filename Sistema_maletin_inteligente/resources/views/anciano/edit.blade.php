@extends('adminlte::page')

@section('title', 'Gestión de paciente')

@section('content_header')
<h1 align="center">Editar datos</h1>
@stop

@section('content')
<form action="{{url('/anciano/'.$anciano->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('anciano.form',['modo'=>'Editar '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
