@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">

            <form action="{{route('admin.trabajador.modificar', [$trabajador->id])}}" method="POST">
                @csrf
                @method('PUT')

                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Modificar Trabajador</span>
                        <div class="row">
                            <div class="col s12 m6 input-field">
                                <input  id="ci" name="ci" type="number" class="validate" value="{{$trabajador->personal->ci}}">
                                <label for="ci">Carnet de Identidad :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input  id="nombre" name="nombre" type="text" class="validate" value="{{$trabajador->personal->nombre}}">
                                <label for="nombre">Nombre :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="paterno" name="paterno" type="text" class="validate" value="{{$trabajador->personal->paterno}}">
                                <label for="paterno">Apellido Paterno :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="materno" name="materno" type="text" class="validate" value="{{$trabajador->personal->materno}}">
                                <label for="materno">Apellido Materno :</label>
                            </div>

                            <div class="col s12  m6 input-field">
                                <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" class="datepicker" value="{{$trabajador->personal->fecha_nacimiento}}">
                                <label for="fecha_nacimiento">Fecha de Nacimiento :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="direccion" name="direccion" type="text" class="validate" value="{{$trabajador->personal->direccion}}">
                                <label for="direccion">Direccion :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="telefono" name="telefono" type="text" class="validate" value="{{$trabajador->personal->telefono}}">
                                <label for="telefono">Telefono :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="especialidad" name="especialidad" type="text" class="validate" value="{{$trabajador->especialidad}}">
                                <label for="especialidad">Especialidad :</label>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col s12 right-align">
                                <button class="btn positive-primary-color" type="submit">modificar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
