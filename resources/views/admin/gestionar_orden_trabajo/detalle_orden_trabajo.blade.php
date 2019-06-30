@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 l8 xl8 offset-m1 offset-l2 offset-xl2">
            <div class="card">
                <div class="card-content">

                    <div class="row">
                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Trabajador:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="accent-color-text">{{$orden->trabajador->personal->nombre. ' ' .$orden->trabajador->personal->paterno. ' ' . $orden->trabajador->personal->materno}}</p>
                        </div>
                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Recepcion:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="accent-color-text">{{$orden->recepcion->vehiculo->placa . ' ' . $orden->recepcion->vehiculo->modelo}}</p>
                        </div>
                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Tiempo Estimado:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="accent-color-text">{{$orden->tiempo_estimado. ' dias'}}</p>
                        </div>


                    </div>

                </div>
                <div class="card-action cancel-primary-color">
                    <a href="{{route('admin.orden_trabajo.index')}}" class="btn negative-primary-color" type="submit">aceptar</a>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
