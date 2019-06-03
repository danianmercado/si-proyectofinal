@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12">
            <a href="{{route('admin.servicio.registrar')}}" class="waves-effect waves-light btn positive-primary-color"><i class="material-icons right">add_box</i>Registrar Servicio</a>
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
                @foreach($servicios as $servicio)
            var fila = [];
            fila[0] = '{{$servicio->id}}';
            fila[1] = '{{$servicio->Tipo_de_Servicio}}';
            fila[2] = '{{$servicio->Estado}}';
            fila[3] = '<div>' +
                '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.servicio.show', [$servicio->id])}}" + ' " class="white-text" >Detalle</a></span>' +
                '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.servicio.editar', [$servicio->id])}}" + ' " class="white-text" >Editar</a></span>' +
                '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.servicio.eliminar', [$servicio->id])}}" + ' " class="white-text" >Eliminar</a></span>' +
                '</div>';
            datos.push(fila);
            @endforeach
            addDatosGeneral(datos);
        })

    </script>
@endsection
