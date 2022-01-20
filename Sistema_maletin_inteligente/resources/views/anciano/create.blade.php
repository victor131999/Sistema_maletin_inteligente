@extends('adminlte::page')

@section('title', 'Gestión')

@section('content_header')
<h1 align="center">Registrar persona</h1>
@stop

@section('content')
<form action="{{url('/anciano')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('anciano.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
