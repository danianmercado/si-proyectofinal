@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="#" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar Herramientas</span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="Descripcion_herramienta" name="Descripcion_herramienta" type="text" class="validate">
                                <label for="Descripcion_herramienta">Descripcion de la herramienta:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="marca" name="marca" type="text" class="validate">
                                <label for="marca">Marca de la herramienta:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="tipo" name="tipo" type="text" class="validate">
                                <label for="tipo">tipo de herramienta:</label>
                            </div>


                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.herramienta.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
