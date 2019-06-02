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
                        <p class="accent-color-text">{{$cliente->id}}</p>
                    </div>
                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Carnet de Identidad:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$cliente->ci}}</p>
                    </div>

                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Nombre Completo:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="secondary-text-color">{{$cliente->nombre}}</p>
                    </div>

                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Telefono:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$cliente->telefono}}</p>
                    </div>

                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Correo electronico:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$cliente->correo_electronico}}</p>
                    </div>

                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Nit:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$cliente->nit}}</p>
                    </div>
                </div>

            </div>
            <div class="card-action cancel-primary-color">
                <a href="{{route('admin.cliente.index')}}" class="btn negative-primary-color" type="submit">aceptar</a>

            </div>
        </div>
    </div>
</div>
@endsection
