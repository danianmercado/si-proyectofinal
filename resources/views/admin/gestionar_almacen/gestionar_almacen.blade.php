@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="#" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar almacen </span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="capacidad" name="capacidad" type="text" class="validate">
                                <label for="capacidad">capacidad del almacen:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="ubicacion" name="ubicacion" type="text" class="validate">
                                <label for="ubicacion">Ubicacion:</label>
                            </div>

                        <div class="row">
                            <div class="col s12 right-align">
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
