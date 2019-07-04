@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.detalle_servicio_tercerizado.modificar',[$servicio_tercerizado->id, $detalle_servicio_tercerizado->id])}}" method="POST">
                @csrf
                @method('PUT')
                  <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar Detalle de Servicio Tercerizado</span>
                        <div class="col s12 input-field">
                            <select class="browser-default" name="id_detTrab">
                                <option value="{{$detalle_servicio_tercerizado->id_detTrab}}" disabled selected>{{$detalle_servicio_tercerizado->detalle_trabajo->id . ' '. $detalle_servicio_tercerizado->detalle_trabajo->descripcion}}</option>
                                @foreach($detalle_trabajos as $detalle)
                                    <option value="{{$detalle->id}}">{{$detalle->id.' '.$detalle->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col s12 input-field">
                            <textarea  id="descripcion" name="descripcion" type="text" class="materialize-textarea" >{{$detalle_servicio_tercerizado->descripcion}}</textarea>
                            <label for="descripcion">Descripcion del Servicio Tercerizado:</label>
                            {!! $errors->first('descripcion','<span class="help-block red-text">Esta información es obligatoria.') !!}
                        </div>


                        <div class="col s12  input-field">
                            <input id="fecha" name="fecha" type="text" class="datepicker" value="{{$detalle_servicio_tercerizado->fecha}}">
                            <label for="fecha">Fecha:</label>
                        </div>



                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.servicio_tercerizado.show',[$servicio_tercerizado->id])}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
