@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 l8 xl8 offset-m1 offset-l2 offset-xl2">
            <div class="card">
                <div class="card-content">

                    <div class="row">
                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">ID:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="accent-color-text">{{$vehiculo->id}}</p>
                        </div>
                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Cliente:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="accent-color-text">{{$vehiculo->cliente->nombre}}</p>
                        </div>

                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Placa del vehiculo:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="secondary-text-color">{{$vehiculo->placa}}</p>
                        </div>

                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Año del vehiculo:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="secondary-text-color">{{$vehiculo->anio}}</p>
                        </div>

                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Color:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="secondary-text-color">{{$vehiculo->color}}</p>
                        </div>

                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Marca de vehiculo:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="secondary-text-color">{{$vehiculo->marca}}</p>
                        </div>

                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Modelo vehiculo:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="secondary-text-color">{{$vehiculo->modelo}}</p>
                        </div>




                    </div>

                </div>
                <div class="card-action cancel-primary-color">
                    <a href="{{route('admin.vehiculo.index')}}" class="btn negative-primary-color" type="submit">aceptar</a>

                </div>
            </div>
        </div>
    </div>
@endsection
