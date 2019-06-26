@extends('admin.template.app')
@section('contenido')

    <div class="row">
        <div class="col s12">
            <a href="{{route('admin.orden_trabajo.registrar')}}" class="waves-effect waves-light btn positive-primary-color"><i class="material-icons right">add_box</i>Registrar Orden de trabajo</a>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <table class="table-general-elements row-border" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiempo Estimado</th>
                        <th>Encargado</th>
                        <th>Vehiculo</th>
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
                @foreach($ordenes as $orden)
            var fila = [];
            fila[0] = '{{$orden->id}}';
            fila[1] = '{{$orden->tiempo_estimado . ' días'}}';
            fila[2] = '{{$orden->trabajador->personal->nombre . ' ' . $orden->trabajador->personal->paterno . ' ' . $orden->trabajador->personal->materno}}';
            fila[3] = '{{$orden->recepcion->vehiculo->placa . ' ' . $orden->recepcion->vehiculo->modelo . ' ' . $orden->recepcion->vehiculo->anio}}';
            fila[4] = '<div>' +
                '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.orden_trabajo.show', [$orden->id])}}" + ' " class="white-text" >Detalle</a></span>' +
                '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.orden_trabajo.editar', [$orden->id])}}" + ' " class="white-text" >Editar</a></span>' +
                '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.orden_trabajo.eliminar', [$orden->id])}}" + ' " class="white-text" >Eliminar</a></span>' +
                '</div>';
            datos.push(fila);
            @endforeach
            addDatosGeneral(datos);
        });

    </script>

@endsection
