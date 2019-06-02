@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="#" method="POST">
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
                                <input id="apellidop" name="apellidop" type="text" class="validate">
                                <label for="apellidop">Apellido Paterno :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="apellidom" name="apellidom" type="text" class="validate">
                                <label for="apellidom">Apellido Materno :</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="Fecha_n" name="Fecha_n" type="text" class="datepicker">
                                <label for="Fecha_n">Fecha de Nacimiento :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="direc" name="direc" type="text" class="validate">
                                <label for="direc">Direccion :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="telf" name="telf" type="text" class="validate">
                                <label for="telf">Telefono :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="esp" name="esp" type="text" class="validate">
                                <label for="esp">Especialidad :</label>
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
