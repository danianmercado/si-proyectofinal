@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">

            <form action="{{route('admin.administrativo.guardar')}}" method="POST">
                @csrf

                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar Administrativo</span>
                        <div class="row">
                            <div class="col s12 m6 input-field">
                                <input  id="ci" name="ci" type="number" class="validate">
                                <label for="ci">Carnet de Identidad :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input  id="nombre" name="nombre" type="text" class="validate">
                                <label for="nombre">Nombre :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="paterno" name="paterno" type="text" class="validate">
                                <label for="paterno">Apellido Paterno :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="materno" name="materno" type="text" class="validate">
                                <label for="materno">Apellido Materno :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" class="datepicker">
                                <label for="fecha_nacimiento">Fecha de Nacimiento :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="direccion" name="direccion" type="text" class="validate">
                                <label for="direccion">Direccion :</label>
                            </div>

                            <div class="col s12 m6 input-field">
                                <input id="telefono" name="telefono" type="text" class="validate">
                                <label for="telefono">Telefono :</label>
                            </div>

                            <div class="col s12  m6 input-field">
                                <input id="area" name="area" type="text" class="validate">
                                <label for="area">Area :</label>
                            </div>


                                <div class="col s12 m6 input-field">
                                    <input id="email" name="email" type="email" class="validate">
                                    <label for="email">Correo :</label>
                                </div>

                                <div class="col s12 m6 input-field">
                                    <input id="password" name="password" type="password" class="validate">
                                    <label for="password">Contraseña :</label>
                                </div>

                            <div class="col s12 m6 input-field">
                                <input id="password_confirmation" name="password_confirmation" type="password" class="validate">
                                <label for="password_confirmation">Repetir Contraseña :</label>
                            </div>

                            <div class="input-field col s12">
                                <select name="id_permiso[]"  multiple>
                                    @foreach($roles as $role)
                                        <optgroup label="{{$role->name}}">
                                            @for($i = 0; $i < count($role->permissions); $i++)
                                                <option value="{{$role->permissions[$i]->id}}">{{$role->permissions[$i]->name}}</option>
                                            @endfor
                                        </optgroup>
                                    @endforeach
                                </select>
                                <label>Roles</label>
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
