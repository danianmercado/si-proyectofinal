@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12">
            <a href="{{route('admin.repuesto.registrar')}}" class="waves-effect waves-light btn positive-primary-color"><i class="material-icons right">add_box</i>Registrar repuesto</a>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <table class="table-general-elements row-border" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Procedencia</th>
                        <th>Costo</th>
                        <th>Descripcion</th>
                        <th>Nombre</th>
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
            @foreach($repuestos as $repuesto)
            var fila = [];
            if ('{{$repuesto->Tipo_producto}}'=='R'){
            fila[0] = '{{$repuesto->id}}';
            fila[1] = '{{$repuesto->procedencia}}';
            fila[2] = '{{$repuesto->Costo}}';
            fila[3] = '{{$repuesto->descripcion}}';
            fila[4] = '{{$repuesto->Nombre}}';
            fila[5] = '<div>' +
                '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "#" + ' " class="white-text" >Detalle</a></span>' +
                '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.repuesto.editar', [$repuesto->id])}}" + ' " class="white-text" >Editar</a></span>' +
                '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.repuesto.eliminar', [$repuesto->id])}}" + ' " class="white-text" >Eliminar</a></span>' +
                '</div>';
            
            datos.push(fila);
            }
            @endforeach
            addDatosGeneral(datos);
        });

    </script>
@endsection
