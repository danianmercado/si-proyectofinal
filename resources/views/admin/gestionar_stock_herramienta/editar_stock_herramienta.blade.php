@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.stock_herramienta.modificar',[$stock_herramienta->id])}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card z-depth-4">
                    <div class="card-content">
                   

                        <span class="card-title center-align">Ingrese la nueva cantidad</span>
                        <div class="row">
                        <div class="col s12 input-field">
 


                            <div class="col s12 input-field">
                                <input  id="Cantidad" name="Cantidad" type="text" class="validate">
                                <label for="Cantidad">cantidad:</label>
                            </div>


                        <div class="row">
                            <div class="col s12 right-align">
                            <a href="{{route('admin.stock_herramienta.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection