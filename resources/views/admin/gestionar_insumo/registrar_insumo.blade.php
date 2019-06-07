@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.insumo.guardar')}}" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar insumo </span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="unidad_de_medida" name="unidad_de_medida" type="text" class="validate">
                                <label for="unidad_de_medida">Unidad medida :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="Costo" name="Costo" type="number" class="validate">
                                <label for="Costo">costo:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="descripcion" name="descripcion" type="text" class="validate">
                                <label for="descripcion">Descripcion:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="Nombre" name="Nombre" type="text" class="validate">
                                <label for="Nombre">Nombre :</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="marca" name="marca" type="text" class="validate">
                                <label for="marca">Marca:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="procedencia" name="procedencia" type="text" class="validate">
                                <label for="procedencia">Procedencia:</label>
                            </div>


                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.insumo.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
