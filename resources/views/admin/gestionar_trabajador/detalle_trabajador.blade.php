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
                        <p class="accent-color-text">{{$trabajador->id}}</p>
                    </div>

                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Nombre Completo:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="secondary-text-color">{{$trabajador->personal->nombre . ' ' . $trabajador->personal->paterno . ' ' . $trabajador->personal->materno}}</p>
                    </div>

                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Telefono:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$trabajador->personal->telefono}}</p>
                    </div>
                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Direccion:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$trabajador->personal->direccion}}</p>
                    </div>

                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Especialidad:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$trabajador->especialidad}}</p>
                    </div>


                </div>

            </div>
            <div class="card-action cancel-primary-color right-align ">
                <a href="{{route('admin.trabajador.index')}}" class="btn negative-primary-color" type="submit">aceptar</a>

            </div>
        </div>
    </div>
</div>
@endsection
