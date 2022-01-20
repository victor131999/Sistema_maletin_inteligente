<div class="form-gourp">

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{isset($anciano->nombre)?$anciano->nombre:old('nombre')}}" id="nombre">


    <label for="contacto">Contacto</label>
    <input type="text" class="form-control" name="contacto" value="{{isset($anciano->contacto)?$anciano->contacto:old('contacto')}}" id="contacto">

    <label for="cedula">Cédula</label>
    <input type="text" class="form-control" name="cedula" value="{{isset($anciano->cedula)?$anciano->cedula:old('cedula')}}" id="cedula">

    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" name="direccion" value="{{isset($anciano->direccion)?$anciano->direccion:old('direccion')}}" id="direccion">

    <label for="num_secuencia">Número de secuencia</label>
    <input type="text" class="form-control" name="num_secuencia" value="{{isset($anciano->num_secuencia)?$anciano->num_secuencia:old('num_secuencia')}}" id="num_secuencia">

    <br/>

    <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('anciano/')}}">Regresar</a>

</div>

