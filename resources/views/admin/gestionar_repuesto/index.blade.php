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
                        <th>Cantidad</th>
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
                    @if ($repuesto->ingreso_repuesto->first()['Cantidad']==null) {
                    <?php $S = "admin.ingreso_repuesto.registrar" ?>
                }@else{
                    <?php $S = "admin.ingreso_repuesto.editar" ?>
                }
                @endif
            fila[0] = '{{$repuesto->id}}';
            fila[1] = '{{$repuesto->procedencia}}';
            fila[2] = '{{$repuesto->Costo}}';
            fila[3] = '{{$repuesto->descripcion}}';
            fila[4] = '{{$repuesto->Nombre}}';
            fila[5] = '{{$repuesto->ingreso_repuesto->first()['Cantidad']}}';
                fila[6] = '<div>' +
                '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.repuesto.show', [$repuesto->id])}}" + ' " class="white-text" >Detalle</a></span>' +
                '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.repuesto.editar', [$repuesto->id])}}" + ' " class="white-text" >Editar</a></span>' +
                '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.repuesto.eliminar', [$repuesto->id])}}" + ' " class="white-text" >Eliminar</a></span>' +
                '<span class="new badge positive-secondary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route($S , [$repuesto->ingreso_repuesto->first()['id']])}}" + ' " class="white-text" >Ingresar Unidades</a></span>' +
                '</div>';

            
            datos.push(fila);
            }
            @endforeach
            addDatosGeneral(datos);
        });

    </script>
@endsection
