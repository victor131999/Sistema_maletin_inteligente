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
    <div class="container">
        <div class="row">
            <div class="col-6">
            <input type="hidden" class="form-control" name="idFact" id="idFact" value="{{isset($actividad->id)?$actividad->id:old('id')}}" id="idFact">
                <label for="id_an">Paciente</label>
                <select  class="form-control" type="text" name="id_an" value="{{isset($actividad->id_an)?$actividad->id_an:old('id_an')}}" id="id_an">
                    @foreach ($anciano as $ancianos)
                            <option value="{{$ancianos->id}} ">
                                {{$ancianos->id}} - {{$ancianos->nombre}}
                            </option>
                    @endforeach
            </select>
            </div>
            <div class="col-6">
                <label for="id_an">Responsable</label>
            <select  class="form-control" type="text" name="id_us" value="{{isset($actividad->id_us)?$actividad->id_us:old('id_us')}}" id="id_us">
                    @foreach ($User as $Users)
                            <option value="{{$Users->id}} ">
                                {{$Users->name}}
                            </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <label for="nombre">Nombre de la terápia</label>
    <input type="text" class="form-control" name="nombre" value="{{isset($actividad->nombre)?$actividad->nombre:old('nombre')}}" id="nombre">

    <label for="descripcion">Descripción</label>
    <textarea type="text" class="form-control" name="descripcion" placeholder=" detalle de las actividades a realizar" value="{{isset($actividad->descripcion)?$actividad->descripcion:old('descripcion')}}" id="descripcion"></textarea>
    <label for="fecha">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{isset($actividad->fecha)?$actividad->fecha:old('fecha')}}" id="fecha">

    <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('actividad/')}}">Regresar</a>
</div>




