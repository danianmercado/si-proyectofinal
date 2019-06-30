@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.detalle_servicio.modificar')}}" method="POST">
                @csrf

                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar Detalle de Servicio</span>
                        <div class="col s12 input-field">
                            <textarea  id="descripcion" name="descripcion" type="text" class="materialize-textarea"></textarea>
                            <label for="descripcion">Descripcion del diagnostico:</label>
                            {!! $errors->first('descripcion','<span class="help-block red-text">Esta información es obligatoria.') !!}
                        </div>


                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.servicio.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
