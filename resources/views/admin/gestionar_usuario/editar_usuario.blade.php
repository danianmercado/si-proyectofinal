@extends('template.app')

@section('content')
    <div class="row">
        <div class="col s12 m6 offset-m3">

            <form action="{{route('auth.guardar')}}" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar</span>
                        <div class="row">
                            <div class="col s12  input-field">
                                <input id="correo" name="correo" type="email" class="validate" >
                                <label for="correo">Correo :</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Contraseña :</label>
                            </div>
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

