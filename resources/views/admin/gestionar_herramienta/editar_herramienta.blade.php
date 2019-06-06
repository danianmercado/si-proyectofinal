@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.herramienta.modificar',[$herramienta->id])}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar herramienta</span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="Descripcion" name="Descripcion" type="text" class="validate"  value="{{$herramienta->Descripcion}}">
                                <label for="Descripcion">Descripcion:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="Marca" name="Marca" type="text" class="validate" value="{{$herramienta->Marca}}">
                                <label for="Marca">Marca:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="Tipo" name="Tipo" type="text" class="validate" value="{{$herramienta->Tipo}}">
                                <label for="Tipo">descripcion :</label>
                            </div>

                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.herramienta.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">Actualizar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection