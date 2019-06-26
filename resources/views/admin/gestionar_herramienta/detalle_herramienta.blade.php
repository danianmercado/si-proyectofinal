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
                            <p class="accent-color-text">{{$herramienta->id}}</p>
                        </div>
                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Descripcion:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="accent-color-text">{{$herramienta->Descripcion}}</p>
                        </div>

                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Marca:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="secondary-text-color">{{$herramienta->Marca}}</p>
                        </div>

                        <div class="col s12 m4">
                            <p class="light-secondary-color title-text-style ">Tipo:</p>
                        </div>
                        <div class="col s8 offset-s2 m8">
                            <p class="secondary-text-color">{{$herramienta->Tipo}}</p>
                        </div>


                    </div>

                </div>
                <div class="card-action cancel-primary-color">
                    <a href="{{route('admin.herramienta.index')}}" class="btn negative-primary-color" type="submit">aceptar</a>

                </div>
            </div>
        </div>
    </div>
@endsection
