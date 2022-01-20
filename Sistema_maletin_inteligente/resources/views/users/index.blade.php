
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<a class="btn btn-secondary btn-sm float-right" href="{{route('users.create')}}">Nuevo usuario</a>
    <h1>Lista de usuarios</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    @livewire('admin.user-index')

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

