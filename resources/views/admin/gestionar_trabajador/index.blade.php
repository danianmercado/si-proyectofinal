@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12">
            <a href="{{route('admin.trabajador.registrar')}}" class="waves-effect waves-light btn positive-primary-color"><i class="material-icons right">add_box</i>Registrar Trabajador</a>
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
                        <th>Especialidad</th>
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
            @foreach($trabajadores as $trabajador)
                var fila = [];
                fila[0] = '{{$trabajador->id}}';
                fila[1] = '{{$trabajador->personal->nombre}}';
                fila[2] = '{{$trabajador->personal->paterno}}';
                fila[3] = '{{$trabajador->personal->materno}}';
                fila[4] = '{{$trabajador->personal->telefono}}';
                fila[5] = '{{$trabajador->especialidad}}';
                fila[6] = '<div>' +
                    '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.trabajador.show', [$trabajador->id])}}" + ' "  class="white-text" >Detalle</a></span>' +
                    '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.trabajador.editar', [$trabajador->id])}}" + ' " class="white-text" >Editar</a></span>' +
                    '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.trabajador.eliminar', [$trabajador->id])}}" + ' " class="white-text" >Eliminar</a></span>' +
                    '</div>';
                datos.push(fila);
            @endforeach
            addDatosGeneral(datos);
        });

    </script>
@endsection
