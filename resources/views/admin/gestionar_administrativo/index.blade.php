@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12">
            @can('admin.create')
            <a href="{{route('admin.administrativo.registrar')}}" class="waves-effect waves-light btn positive-primary-color"><i class="material-icons right">add_box</i>Registrar Administrativo</a>
             @endcan
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <table class="table-general-elements row-border" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>C.I.</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Teléfono</th>
                        <th>Area</th>
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
                @foreach($administrativos as $administrativo)
            var fila = [];
            fila[0] = '{{$administrativo->id}}';
            fila[1] = '{{$administrativo->personal->nombre}}';
            fila[2] = '{{$administrativo->personal->paterno}}';
            fila[3] = '{{$administrativo->personal->materno}}';
            fila[4] = '{{$administrativo->personal->telefono}}';
            fila[5] = '{{$administrativo->area}}';
            fila[6] = '<div>' +
                 @can('admin.show')
                '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.administrativo.show', [$administrativo->id])}}" + ' "  class="white-text" >Detalle</a></span>' +
                @endcan
                @can('admin.edit')
                '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.administrativo.editar', [$administrativo->id])}}" + ' " class="white-text" >Editar</a></span>' +
                @endcan
                @can('admin.delete')
                '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.administrativo.eliminar', [$administrativo->id])}}" + ' " class="white-text" >Eliminar</a></span>' +
                @endcan
                '</div>';
            datos.push(fila);
            @endforeach
            addDatosGeneral(datos);
        });

    </script>
@endsection
