@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.cliente.modificar', [$cliente->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar Cliente </span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="id" name="ci" type="number" class="validate" value="{{$cliente->ci}}">
                                <label for="id">Carnet de Identidad :</label>
                                {!! $errors->first('ci','<span class="help-block red-text">:message</span>') !!}
                            </div>

                            <div class="col s12 input-field">
                                <input  id="nombre" name="nombre" type="text" class="validate " value="{{$cliente->nombre}}">
                                <label for="nombre">Nombre Completo:</label>
                                {!! $errors->first('nombre','<span class="help-block red-text">:message</span>') !!}

                            </div>


                            <div class="col s12 input-field">
                                <input id="telefono" name="telefono" type="number" class="validate" value="{{$cliente->telefono}}">
                                <label for="telefono">Telefono :</label>
                                {!! $errors->first('telefono','<span class="help-block red-text">:message</span>') !!}
                            </div>
                            <div class="col s12 input-field">
                                <input id="correo_electronico" name="correo_electronico" type="email" class="email" value="{{$cliente->correo_electronico}}">
                                <label for="correo_electronico">Correo :</label>
                                {!! $errors->first('correo_electronico','<span class="help-block red-text">:message</span>') !!}
                            </div>

                            <div class="col s12 input-field">
                                <input id="nit" name="nit" type="number" class="validate" value="{{$cliente->nit}}">
                                <label for="nit">Nit :</label>
                                {!! $errors->first('nit','<span class="help-block red-text">:message</span>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 right-align">
                                <button class="btn positive-primary-color" type="submit">actualizar</button>
                                <a href="{{route('admin.cliente.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
