@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.servicio_tercerizado.modificar',[$servicio_tercerizado->id])}}" method="POST">
                @csrf
                @method('PUT')

                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar servicio tercerizado </span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="Contacto" name="Contacto" type="text" class="validate" value="{{$servicio_tercerizado->Contacto}}" >
                                <label for ="Contacto" >Contacto :</label>
                                {!! $errors->first('Contacto','<span class="help-block red-text">Esta información es obligatoria.') !!}
                            </div>

                            <div class="col s12 input-field">
                                <input  id="Ubicacion" name="Ubicacion" type="text" class="validate" value="{{$servicio_tercerizado->Ubicacion}}">
                                <label for="Ubicacion" >Lugar de servicio tercerizado:</label>
                                {!! $errors->first('Ubicacion','<span class="help-block red-text">Esta información es obligatoria.') !!}
                            </div>

                            <div class="col s12  input-field">
                                <input id="telefono" name="telefono" type="text" class="validate" value="{{$servicio_tercerizado->telefono}}">
                                <label for="telefono" > telefono de servicio tercerizado:</label>
                            </div>


                            <div class="row">
                                <div class="col s12 right-align">
                                    <a href="{{route('admin.servicio_tercerizado.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                    <button class="btn positive-primary-color" type="submit">actualizar </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
