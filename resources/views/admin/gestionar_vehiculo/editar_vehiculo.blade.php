@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.vehiculo.modificar',[$vehiculo->id])}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar Vehiculo </span>
                        <div class="row">

                            <div class="col s12 input-field">
                                <select name="id_cliente">
                                    <option value="{{$vehiculo->cliente->id_vehiculo}}" disabled selected>{{$vehiculo->cliente->nombre}}</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>
                                <label>Seleccione un cliente: </label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="placa" name="placa" type="text" class="validate" value="{{$vehiculo->placa}}">
                                <label for="placa">Placa del vehiculo :</label>
                            </div>


                            <div class="col s12  input-field">
                                <input id="anio" name="anio" type="number" class="validate" value="{{$vehiculo->anio}}">
                                <label for="anio">Año del vehiculo:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="color" name="color" type="text" class="color" value="{{$vehiculo->color}}">
                                <label for="color">Color :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="marca" name="marca" type="text" class="validate" value="{{$vehiculo->marca}}">
                                <label for="marca">Marca del vehiculo :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="modelo" name="modelo" type="text" class="validate" value="{{$vehiculo->modelo}}">
                                <label for="modelo">Modelo del vehiculo:</label>
                            </div>

                            <div class="row">
                                <div class="col s12 right-align">
                                    <a href="{{route('admin.vehiculo.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
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

