@extends('admin.template.app')
@section('contenido')
<div class="row">
    <div class="col s12 m10 l8 xl8 offset-m1 offset-l2 offset-xl2">
        <div class="card">
            <div class="card-content">

                <div class="row">
                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Tipo de servicio:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$servicio->Tipo_de_Servicio}}</p>
                    </div>
                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Estado:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$servicio->Estado}}</p>
                    </div>

                </div>

            </div>
            <div class="card-action cancel-primary-color">
                <a href="{{route('admin.servicio.index')}}" class="btn negative-primary-color" type="submit">aceptar</a>

            </div>
        </div>
    </div>
</div>
@endsection
