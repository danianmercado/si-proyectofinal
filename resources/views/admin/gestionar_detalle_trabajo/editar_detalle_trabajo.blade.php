@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.detalle_trabajo.modificar',[$detalle->id])}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar Detalle de trabajo </span>
                        <div class="col s12 input-field">
                            <select name="id_ot">
                                <option value="{{$detalle->id_ot}}" disabled selected>{{$detalle->id_ot}}</option>
                                @foreach($ordenes as $orden)
                                    <option value="{{$orden->id}}">{{$orden->id}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col s12 input-field">
                            <select name="id_servicio">
                                <option value="{{$detalle->id_servicio}}" disabled selected>{{$detalle->servicio->Tipo_de_Servicio}}</option>
                                @foreach($servicios as $servicio)
                                    <option value="{{$servicio->id}}">{{$servicio->Tipo_de_Servicio}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="precio" name="precio" type="text" class="validate" value="{{$detalle->precio}}">
                                <label for="precio">Precio :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="descripcion" name="descripcion" type="text" class="validate" value="{{$detalle->descripcion}}">
                                <label for="descripcion">Descripcion:</label>
                            </div>

                            <div class="row">
                                <div class="col s12 right-align">
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
