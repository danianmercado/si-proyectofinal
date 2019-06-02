@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.vehiculo.guardar')}}" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar Vehiculo </span>
                        <div class="row">

                            <div class="col s12 input-field">
                                <select name="id_cliente">
                                    <option value="" disabled selected>Seleccione un cliente:</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col s12 input-field">
                                <input  id="placa" name="placa" type="text" class="validate">
                                <label for="placa">Placa del vehiculo :</label>
                            </div>


                            <div class="col s12  input-field">
                                <input id="anio" name="anio" type="number" class="validate">
                                <label for="anio">Año del vehiculo:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="color" name="color" type="text" class="color">
                                <label for="color">Color :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="marca" name="marca" type="text" class="validate">
                                <label for="marca">Marca del vehiculo :</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="modelo" name="modelo" type="text" class="validate">
                                <label for="modelo">Modelo del vehiculo:</label>
                            </div>

                        <div class="row">
                            <div class="col s12 right-align">
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>

                    </div>
                </div>
                </div>

            </form>


        </div>
    </div>
@endsection
