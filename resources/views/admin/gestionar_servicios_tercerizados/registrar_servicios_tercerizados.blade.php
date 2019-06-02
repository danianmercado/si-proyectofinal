@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.servicio_tercerizado.guardar')}}" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar servicio tercerizado </span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="Contacto" name="Contacto" type="text" class="validate">
                                <label for="Contacto">Contacto :</label>
                                {!! $errors->first('Contacto','<span class="help-block red-text">Esta información es obligatoria.') !!}
                            </div>

                            <div class="col s12 input-field">
                                <input  id="Ubicacion" name="Ubicacion" type="text" class="validate">
                                <label for="Ubicacion">Lugar de servicio tercerizado:</label>
                                {!! $errors->first('Ubicacion','<span class="help-block red-text">Esta información es obligatoria.') !!}
                            </div>

                            <div class="col s12  input-field">
                                <input id="telefono" name="telefono" type="text" class="validate">
                                <label for="telefono">telefono de servicio tercerizado:</label>
                            </div>


                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.servicio_tercerizado.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
