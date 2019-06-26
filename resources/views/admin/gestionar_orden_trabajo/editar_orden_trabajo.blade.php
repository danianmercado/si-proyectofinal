@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.orden_trabajo.modificar',[$orden->id])}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar Orden de Trabajo</span>
                        <div class="row">

                            <div class="col s12 input-field">
                                <select class="browser-default" name="id_trabajador">
                                    <option value="{{$orden->trabajador->personal}}" disabled selected>{{$orden->trabajador->personal->nombre. ' ' .$orden->trabajador->personal->paterno. ' ' . $orden->trabajador->personal->materno}}</option>
                                    @foreach($trabajadores as $trabajador)
                                        <option value="{{$trabajador->id}}">{{$trabajador->personal->nombre . ' ' . $trabajador->personal->paterno . ' ' . $trabajador->personal->materno}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col s12 input-field">
                                <select class="browser-default" name="id_recepcion">
                                    <option value="{{$orden->recepcion->vehiculo}}" disabled selected>{{$orden->recepcion->vehiculo->placa . ' ' . $orden->recepcion->vehiculo->modelo}}</option>
                                    @foreach($recepciones as $recepcion)
                                        <option value="{{$recepcion->vehiculo->id}}">{{$recepcion->vehiculo->marca . ' ' . $recepcion->vehiculo->modelo . ' ' . $recepcion->vehiculo->placa}}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="col s12 input-field">
                                <input  id="tiempo_estimado" name="tiempo_estimado" type="number" class="validate" value="{{$orden->tiempo_estimado}}">
                                <label for="tiempo_estimado">Tiempo estimado :</label>
                            </div>


                            <div class="row">
                                <div class="col s12 right-align">
                                    <a href="{{route('admin.orden_trabajo.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>

                                    <button class="btn positive-primary-color" type="submit">registrar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>




            </form>


        </div>
    </div>
@endsection
