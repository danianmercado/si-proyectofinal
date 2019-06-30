@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12">
            <a href="{{route('admin.insumo.registrar')}}" class="waves-effect waves-light btn positive-primary-color"><i class="material-icons right">add_box</i>Registrar insumo</a>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <table class="table-general-elements row-border" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>Descripcion</th>
                        <th>Unidad de medida</th>
                        <th>Costo</th>
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
                @foreach($insumos as $insumo)
            var fila = [];
            if ('{{$insumo->Tipo_producto}}'=='I'){
                    @if ($insumo->ingreso_insumo->first()['Cantidad']==null) {
                    <?php $S = "admin.ingreso_insumo.registrar" ?>
                }@else{
                    <?php $S = "admin.ingreso_insumo.editar" ?>
                }
                @endif
            fila[0] = '{{$insumo->id}}';
            fila[1] = '{{$insumo->Nombre}}';
            fila[2] = '{{$insumo->descripcion}}';
            fila[3] = '{{$insumo->unidad_de_medida}}';
            fila[4] = '{{$insumo->Costo}}';
            fila[5] = '{{$insumo->ingreso_insumo->first()['Cantidad']}}'; 
            fila[6] = '<div>' +
                '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.insumo.show', [$insumo->id])}}" + ' " class="white-text" >Detalle</a></span>' +
                '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.insumo.editar', [$insumo->id])}}" + ' " class="white-text" >Editar</a></span>' +
                '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route('admin.insumo.eliminar', [$insumo->id])}}" + ' " class="white-text" >Eliminar</a></span>' +
                '<span class="new badge positive-secondary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "{{route($S , [$insumo->ingreso_insumo->first()['id']])}}" + ' " class="white-text" >Ingresar Unidades</a></span>' +
                '</div>';
            datos.push(fila);
            }
            @endforeach
            addDatosGeneral(datos);
        });

    </script>
@endsection
