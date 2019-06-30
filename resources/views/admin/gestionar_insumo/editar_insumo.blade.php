@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.insumo.modificar',[$insumo->id])}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar insumo </span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="unidad_de_medida" name="unidad_de_medida" type="text" class="validate" value="{{$insumo->unidad_de_medida}}">
                                <label for="unidad_de_medida">Unidad medida :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="Costo" name="Costo" type="text" class="validate" value="{{$insumo->Costo}}">
                                <label for="Costo">costo:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="descripcion" name="descripcion" type="text" class="validate" value="{{$insumo->descripcion}}">
                                <label for="descripcion">Descripcion:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="Nombre" name="Nombre" type="text" class="validate" value="{{$insumo->Nombre}}">
                                <label for="Nombre">Nombre :</label>
                            </div>
                            <div class="col s12  input-field">
                                <input id="marca" name="marca" type="text" class="validate" value="{{$insumo->marca}}">
                                <label for="marca">Marca:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="procedencia" name="procedencia" type="text" class="validate" value="{{$insumo->procedencia}}" >
                                <label for="procedencia">Procedencia:</label>
                            </div>


                            <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.insumo.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
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
