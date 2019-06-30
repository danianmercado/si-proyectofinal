@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.nota_reparacion.guardar')}}" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Registrar Nota de Reparacion</span>

                        <div class="col s12 input-field">
                            <select name="id_ot">
                                <option value="" disabled selected>Seleccione una Orden de trabajo:</option>
                                @foreach($ordenes as $orden)
                                    <option value="{{$orden->id}}">{{$orden->id}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col s12 input-field">
                            <input  id="Fecha_entrega" name="Fecha_entrega" type="text" class="datepicker">
                            <label for="Fecha_entrega">Fecha de Entrega:</label>
                            {!! $errors->first('Fecha_entrega','<span class="help-block red-text">Esta información es obligatoria.') !!}
                        </div>
                        <div class="col s12  input-field">
                            <input  id="observaciones" name="observaciones" type="text" class="validate">
                            <label for="observaciones">Observaciones :</label>
                        </div>

                        <div class="col s12 input-field">
                            <input id="total" name="total" type="number" class="validate">
                            <label for="total">Total:</label>
                        </div>


                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.nota_reparacion.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">registrar</button>
                            </div>
                        </div>



                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
