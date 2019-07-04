@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.detalleuso.guardar')}}" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Ingrese la cantidad</span>
                        <div class="row">
                        
                        <div class="col s12 input-field">
                                <select name="id_det">
                                    <option value="" disabled selected>Seleccione el detalle:</option>
                                    @foreach($detalletrabajo as $dt)
                                   
                                        <option value="{{$dt->id}}">{{$dt->id}}</option>
                    
                                    @endforeach
                                </select>

                            </div>
                            <div class="col s12 input-field">
                                <select name="id_producto">
                                    <option value="" disabled selected>Seleccione el producto:</option>
                                    @foreach($productos as $producto)
                                   
                                        <option value="{{$producto->id}}">{{$producto->Nombre}}</option>
                    
                                    @endforeach
                                </select>

                            </div>


                            <div class="col s12 input-field">
                                <textarea  id="cantidad" name="cantidad" type="text" class="materialize-textarea"></textarea>
                                <label for="cantidad">Cantidad:</label>
                                {!! $errors->first('cantidad','<span class="help-block red-text">Esta información es obligatoria.') !!}
                            </div>




                            <div class="row">
                                <div class="col s12 right-align">
                                    <a href="{{route('admin.detalle_trabajo.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
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