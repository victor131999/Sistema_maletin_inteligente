
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Crear un rol</h1>
@stop

@section('content')
    <div class="card-body">
        {!! Form::open(['route' => 'users.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el nombre']) !!}
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                <br>
                {!! Form::label('email', 'E-mail') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el correo']) !!}
                @error('email')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                <br>
                {!! Form::label('password', 'Contraseña') !!}
                {!! Form::text('password', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la contraseña']) !!}
                @error('password')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <h2 class="h5">Listado de roles:</h2>
            @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
            @endforeach
            @error('roles')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br>
            {!! Form::submit('Crear usuario', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

