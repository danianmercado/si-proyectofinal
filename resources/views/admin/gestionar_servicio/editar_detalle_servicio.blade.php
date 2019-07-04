@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.detalle_servicio.modificar',[$servicio->id,$detalle->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar Detalle de Servicio</span>
                        <div class="col s12 input-field">
                            <textarea  id="descripcion" name="descripcion" type="text" class="materialize-textarea">{{$detalle->descripcion}}</textarea>
                            <label for="descripcion">Descripcion del detalle de servicio:</label>
                            {!! $errors->first('descripcion','<span class="help-block red-text">Esta información es obligatoria.') !!}
                        </div>


                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.servicio.show',[$servicio->id])}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
