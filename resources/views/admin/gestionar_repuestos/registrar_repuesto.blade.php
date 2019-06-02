@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="#" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar repuesto</span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="procedencia" name="procedencia" type="text" class="validate">
                                <label for="procedencia">Procedencia:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input  id="tipo de repuesto" name="tipo de repuesto" type="text" class="validate">
                                <label for="tipo de repuesto">tipo de repuesto:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="costo" name="costo" type="text" class="validate">
                                <label for="costo">costo:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="descripcion" name="descripcion" type="text" class="validate">
                                <label for="descripcion">descripcion :</label>
                            </div>
                            <div class="col s12 input-field">
                                <input id="nombre" name="nombre" type="text" class="validate">
                                <label for="nombre">nombre:</label>
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
