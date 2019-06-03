@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12">
            <a href="{{route('admin.servicio_tercerizado.registrar')}}" class="waves-effect waves-light btn positive-primary-color"><i class="material-icons right">add_box</i>Registrar Servicios Tercerizados</a>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <table class="table-general-elements row-border" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Contacto</th>
                        <th>Lugar</th>
                        <th>telefono</th>

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
                @foreach($servicios_tercerizados as $servicio_Tercerizado)
            var fila = [];
            fila[0] =  '{{$servicio_Tercerizado->id}}';
            fila[1] =  '{{$servicio_Tercerizado->Contacto}}';
            fila[2] =  '{{$servicio_Tercerizado->Ubicacion}}';
            fila[3] =  '{{$servicio_Tercerizado->telefono}}';
            fila[4] = '<div>' +
                '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "#" + ' " class="white-text" >Detalle</a></span>' +
                '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.servicio_tercerizado.editar', [$servicio_Tercerizado->id])}}" + ' " class="white-text" >Editar</a></span>' +
                '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "#" + ' " class="white-text" >Eliminar</a></span>' +
                '</div>';
            datos.push(fila);
            @endforeach
            addDatosGeneral(datos);
        });

    </script>
@endsection
