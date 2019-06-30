@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.detalle_servicio_tercerizado.guardar')}}" method="POST">
                @csrf

                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar Detalle de Servicio Tercerizado</span>
                        <div class="col s12 input-field">
                            <select class="browser-default" name="id_trabajador">
                                <option value="" disabled selected>Seleccione un Detalle de trabajo</option>
                                @foreach($detalles as $detalle)
                                    <option value="{{$detalle->id}}">{{$detalle->id.' '.$detalle->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col s12 input-field">
                            <select class="browser-default" name="id_recepcion">
                                <option value="" disabled selected>Seleccione un Servicio Tercerizado</option>
                                @foreach($servicios as $servicio)
                                    <option value="{{$servicio->id}}">{{$servicio->Contacto}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col s12 input-field">
                            <textarea  id="descripcion" name="descripcion" type="text" class="materialize-textarea"></textarea>
                            <label for="descripcion">Descripcion del Servicio Tercerizado:</label>
                            {!! $errors->first('descripcion','<span class="help-block red-text">Esta información es obligatoria.') !!}
                        </div>


                        <div class="col s12  input-field">
                            <input id="fecha" name="fecha" type="text" class="datepicker">
                            <label for="fecha">Fecha:</label>
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
