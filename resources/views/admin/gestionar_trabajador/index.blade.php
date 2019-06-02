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
                        <th>Fecha Nacimiento</th>
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
            @for($i = 0; $i < 5; $i++)
                var fila = [];
                fila[0] = '{{$i}}';
                fila[1] = 'Rosanyela';
                fila[2] = 'Hurtado';
                fila[3] = 'Rico';
                fila[4] = '70823007';
                fila[5] = '20-03-1998';
                fila[6] = '<div>' +
                    '<span class="new badge positive-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "#" + ' " class="white-text" >Detalle</a></span>' +
                    '<span class="new badge neutral-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "#" + ' " class="white-text" >Editar</a></span>' +
                    '<span class="new badge negative-primary-color" data-badge-caption="" style="margin-right:5px"><a href=" ' + "#" + ' " class="white-text" >Eliminar</a></span>' +
                    '</div>';
                datos.push(fila);
            @endfor
            addDatosGeneral(datos);
        });

    </script>
@endsection
