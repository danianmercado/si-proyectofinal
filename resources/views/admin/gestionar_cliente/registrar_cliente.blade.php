@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.cliente.guardar')}}" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar Cliente </span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="ci" name="ci" type="number" class="validate" value="{{old('ci')}}">
                                <label for="ci">Carnet de Identidad :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="nombre" name="nombre" type="text" class="validate " value="{{old('nombre')}}">
                                <label for="nombre">Nombre Completo:</label>
                                {!! $errors->first('nombre','<span class="help-block red-text">Esta información es obligatoria.') !!}

                            </div>


                            <div class="col s12 input-field">
                                <input id="telefono" name="telefono" type="number" class="validate">
                                <label for="telefono">Telefono :</label>
                                {!! $errors->first('telefono','<span class="help-block red-text">Esta información es obligatoria.') !!}
                            </div>
                            <div class="col s12 input-field">
                                <input id="correo_electronico" name="correo_electronico" type="email" class="email">
                                <label for="correo_electronico">Correo :</label>
                                {!! $errors->first('correo_electronico','<span class="help-block red-text">Esta información es obligatoria.') !!}
                            </div>

                            <div class="col s12 input-field">
                                <input id="nit" name="nit" type="number" class="validate">
                                <label for="nit">Nit :</label>
                                {!! $errors->first('nit','<span class="help-block red-text">Esta información es obligatoria.') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 right-align">
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                                <a href="{{route('admin.cliente.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
