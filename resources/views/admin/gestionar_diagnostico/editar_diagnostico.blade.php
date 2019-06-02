@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.diagnostico.modificar',[$diagnostico->id])}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar Diagnostico</span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <textarea  id="descripcion" name="descripcion" type="text" class="materialize-textarea" >{{$diagnostico->descripcion}}</textarea>
                                <label for="descripcion">Descripcion del diagnostico:</label>
                                {!! $errors->first('descripcion','<span class="help-block red-text">Esta información es obligatoria.') !!}
                            </div>

                            <div class="col s12 input-field">
                                <select name="id_recepcion">
                                    <option value="{{$diagnostico->recepcion->id_recepcion}}" disabled selected>{{$diagnostico->recepcion->id}}</option>
                                    @foreach($recepciones as $recepcion)
                                        <option value="{{$recepcion->id}}">{{$recepcion->id}}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="row">
                                <div class="col s12 right-align">
                                    <a href="{{route('admin.diagnostico.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
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
