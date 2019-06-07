@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.recepcion.modificar',[$recepcion->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar</span>
                        <div class="row">

                            <label>Seleccionar</label>
                            <select class="browser-default" name="id_vehiculo" >
                                <option value="{{$recepcion->id_vehiculo}}" >{{$recepcion->vehiculo->placa}}</option>
                                @foreach($vehiculos as $vehiculo)
                                    <option value="{{$vehiculo->id}}">{{$vehiculo->placa}}</option>

                                @endforeach

                            </select>

                            <div class="col s12 input-field">
                                <input  id="estado" name="estado" type="text" class="validate" value="{{$recepcion->estado}}">
                                <label for="estado">Estado:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="fecha_ingreso" name="fecha_ingreso" type="text" class="datepicker" value="{{$recepcion->fecha_ingreso}}">
                                <label for="fecha_ingreso">Fecha:</label>
                            </div>



                            <div class="row">
                                <div class="col s12 right-align">
                                    <a href="{{route('admin.recepcion.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>

                                    <button class="btn positive-primary-color" type="submit">Actualizar</button>

                                </div>
                            </div>


                    </div>
                </div>


                </div>

            </form>


        </div>
    </div>
@endsection
