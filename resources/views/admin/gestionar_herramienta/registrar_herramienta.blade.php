@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.herramienta.guardar')}}" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar Herramientas</span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="Descripcion" name="Descripcion" type="text" class="validate">
                                <label for="Descripcion">Descripcion de la herramienta:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="Marca" name="Marca" type="text" class="validate">
                                <label for="Marca">Marca de la herramienta:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="Tipo" name="Tipo" type="text" class="validate">
                                <label for="Tipo">tipo de herramienta:</label>
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
