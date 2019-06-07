@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12">
            <a href="{{route('admin.almacen.registrar')}}" class="waves-effect waves-light btn positive-primary-color"><i class="material-icons right">add_box</i>Registrar almacen</a>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <table class="table-general-elements row-border" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Capacidad</th>
                        <th>ubicacion</th>
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
            @foreach($almacenes as $almacen)
                var fila = [];
                fila[0] = '{{$almacen->id}}';
                fila[1] = '{{$almacen->Capacidad}}';
                fila[2] = '{{$almacen->ubicacion}}';
                fila[3] = '<div>' +
                    '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.almacen.show', [$almacen->id])}}" + ' " class="white-text" >Detalle</a></span>' +
                    '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.almacen.editar', [$almacen->id])}}" + ' " class="white-text" >Editar</a></span>' +
                    '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.almacen.eliminar', [$almacen->id])}}" + ' " class="white-text" >Eliminar</a></span>' +
                    '</div>';
                datos.push(fila);
            @endforeach
            addDatosGeneral(datos);
        });

    </script>
@endsection
