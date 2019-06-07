@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.trabajador.guardar')}}" method="POST">
                @csrf

                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar Trabajador</span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="ci" name="ci" type="text" class="validate">
                                <label for="ci">Carnet de Identidad :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="nombre" name="nombre" type="text" class="validate">
                                <label for="nombre">Nombre :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="paterno" name="paterno" type="text" class="validate">
                                <label for="paterno">Apellido Paterno :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="materno" name="materno" type="text" class="validate">
                                <label for="materno">Apellido Materno :</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" class="datepicker">
                                <label for="fecha_nacimiento">Fecha de Nacimiento :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="direccion" name="direccion" type="text" class="validate">
                                <label for="direccion">Direccion :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="telefono" name="telefono" type="text" class="validate">
                                <label for="telefono">Telefono :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="especialidad" name="especialidad" type="text" class="validate">
                                <label for="especialidad">Especialidad :</label>
                            </div>
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
