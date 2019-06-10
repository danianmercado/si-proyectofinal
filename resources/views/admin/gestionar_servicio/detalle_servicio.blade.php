@extends('admin.template.app')
@section('contenido')
<div class="row">
    <div class="col s12 m10 l8 xl8 offset-m1 offset-l2 offset-xl2">
        <div class="card">
            <div class="card-content">

                <div class="row">
                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Tipo de servicio:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$servicio->Tipo_de_Servicio}}</p>
                    </div>
                    <div class="col s12 m4">
                        <p class="light-secondary-color title-text-style ">Estado:</p>
                    </div>
                    <div class="col s8 offset-s2 m8">
                        <p class="accent-color-text">{{$servicio->Estado}}</p>
                    </div>

                </div>

            </div>
            <div class="card-action cancel-primary-color  right-align">
                <a href="{{route('admin.servicio.index')}}" class="btn negative-primary-color" type="submit">aceptar</a>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <a href="#" class="waves-effect waves-light btn positive-primary-color"><i class="material-icons right">add_box</i>Registrar Detalle Servicio</a>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <table class="table-general-elements row-border" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de servicio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var datos = [];
        var fila = [];

        fila[0] = '<div>' +
            '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "#" + ' " class="white-text" >Detalle</a></span>' +
            '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "#" + ' " class="white-text" >Editar</a></span>' +
            '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "#" + ' " class="white-text" >Eliminar</a></span>' +
            '</div>';
        datos.push(fila);
        addDatosGeneral(datos);
    };
</script>



@endsection
