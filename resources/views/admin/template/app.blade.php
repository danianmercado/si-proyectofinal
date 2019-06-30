<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Franco Motors</title>

    <!-- Import External Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Import Internal Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin-materialize.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jqvmap.css')}}">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}"/>

    <!-- Import Google Material Icons-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Import External Fullcalendar-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<header>
    <ul id="sidenav-left" class="sidenav white">
        <li><div class="user-view">
                <div class="background dark-secondary-background">
                </div>
                <a href="#user"><img class="circle" src="{{asset('images/logo.png')}}"></a>
                <a href="#name"><span class="white-text name">
                        {{auth()->user()->personal->nombre . ' ' . auth()->user()->personal->paterno . ' ' . auth()->user()->personal->materno}}
                    </span>
                </a>
                <a href="#email"><span class="white-text email">{{auth()->user()->email}}</span></a>
            </div>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">

                <li class="bold waves-effect"><a class="collapsible-header">personal<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @can('trabajador.index')
                                <li><a href="{{route('admin.trabajador.index')}}" class="waves-effect">Trabajador<i class="material-icons">list</i></a></li>
                            @endcan
                            @can('admin.index')
                                <li><a href="{{route('admin.administrativo.index')}}" class="waves-effect">Administrativo<i class="material-icons">list</i></a></li>
                            @endcan
                        </ul>


                <li class="bold waves-effect"><a class="collapsible-header">recepciones<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @can('recepcion.index')
                            <li><a href="{{route('admin.recepcion.index')}}" class="waves-effect">Gestionar recepcion<i class="material-icons">list</i></a></li>
                            @endcan
                            @can('cliente.index')
                            <li><a href="{{route('admin.cliente.index')}}" class="waves-effect">Gestionar cliente<i class="material-icons">list</i></a></li>
                            @endcan
                            @can('vehiculo.index')
                            <li><a href="{{route('admin.vehiculo.index')}}" class="waves-effect">Gestionar vehiculo<i class="material-icons">list</i></a></li>
                             @endcan
                             @can('diagnostico.index')
                            <li><a href="{{route('admin.diagnostico.index')}}" class="waves-effect">Gestionar diagnostico<i class="material-icons">list</i></a></li>
                             @endcan
                        </ul>
                    </div>
                </li>


                <li class="bold waves-effect"><a class="collapsible-header">Servicios<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @can('servicio.index')
                            <li><a href="{{route('admin.servicio.index')}}" class="waves-effect">Gestionar Servicio<i class="material-icons">list</i></a></li>
                            @endcan
                            @can('servicio_tercerizado.index')
                            <li><a href="{{route('admin.servicio_tercerizado.index')}}" class="waves-effect">Gestionar Servicio Tercerizados<i class="material-icons">list</i></a></li>
                            @endcan


                        </ul>
                    </div>
                </li>

                <li class="bold waves-effect"><a class="collapsible-header">Trabajos<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @can('orden_trabajo.index')
                            <li><a href="{{route('admin.orden_trabajo.index')}}" class="waves-effect">Gestionar Orden de trabajo<i class="material-icons">list</i></a></li>
                            @endcan
                            @can('detalle_trabajo.index')
                            <li><a href="{{route('admin.detalle_trabajo.index')}}" class="waves-effect">Gestionar detalles de trabajo<i class="material-icons">list</i></a></li>
                            @endcan
                            @can('nota_reparacion.index')
                            <li><a href="{{route('admin.nota_reparacion.index')}}" class="waves-effect">Gestionar nota de reparacion<i class="material-icons">list</i></a></li>
                            @endcan
                        </ul>
                    </div>
                </li>

                <li class="bold waves-effect"><a class="collapsible-header">almacen<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @can('almacen.index')
                            <li><a href="{{route('admin.almacen.index')}}" class="waves-effect">Gestionar almacen<i class="material-icons">list</i></a></li>
                            @endcan

                            <li><a href="{{route('admin.insumo.index')}}" class="waves-effect">Gestionar Insumo<i class="material-icons">list</i></a></li>

                            @can('herramienta.index')
                            <li><a href="{{route('admin.herramienta.index')}}" class="waves-effect">Gestionar Herramienta<i class="material-icons">list</i></a></li>
                            @endcan
                            @can('repuesto.index')
                            <li><a href="{{route('admin.repuesto.index')}}" class="waves-effect">Gestionar Repuesto<i class="material-icons">list</i></a></li>
                            @endcan
                            <ul class="collapsible collapsible-accordion">
                                <li class="bold waves-effect"><a class="collapsible-header">Stocks<i class="material-icons chevron">chevron_left</i></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{route('admin.stock_insumo.index')}}" class="waves-effect">Gestionar Stock de Insumos<i class="material-icons">list</i></a></li>
                                            <li><a href="{{route('admin.stock_repuesto.index')}}" class="waves-effect">Gestionar Stock de Repuestos<i class="material-icons">list</i></a></li>
                                            <li><a href="{{route('admin.stock_herramienta.index')}}" class="waves-effect">Gestionar Stock de Herramientas<i class="material-icons">list</i></a></li>
                                        </ul>

                                    </div>

                                </li>
                            </ul>
                        </ul>
                    </div>
                </li>
                </div>

                </li>
            </ul>
        </li>
    </ul>
</header>
<nav class="navbar nav-extended no-padding dark-primary-background">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo dark-primary-color">FRANCO MOTORS</a>
        <ul id="nav-mobile" class="right">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <li class="hide-on-med-and-down"><a href="{{route('home')}}" class="waves-effect dark-primary-color"><i class="material-icons">home</i></a></li>
                <li><button type="submit" class="waves-effect dark-primary-color"><i class="material-icons">close</i></button></li>
            </form>
        </ul>

        <a href="#!" data-target="sidenav-left" class="sidenav-trigger left "><i class="material-icons dark-primary-color ">menu</i></a>
    </div>
</nav>
<main class="light-primary-background"> <!-- contenido de toda la pagina -->
    <div class="container">
        @yield('contenido')
    </div>
</main>

<!--JavaScript at end of body for optimized loading-->
<!-- Import Internal Materialize -->
<script rel="script" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script rel="script" type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
<script rel="script" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>

<!-- External libraries -->
<!-- jqvmap -->
<script rel="script" type="text/javascript" src="{{asset('js/jqvmap/jquery.vmap.min.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('js/jqvmap/jquery.vmap.world.js')}}" charset="utf-8"></script>
<script rel="script" type="text/javascript" src="{{asset('js/jqvmap/jquery.vmap.sampledata.js')}}"></script>

<!-- ChartJS -->
<script rel="script" type="text/javascript" src="{{asset('js/Chart.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('js/Chart.Financial.js')}}"></script>


<!-- Import External Google Jquery-->
<!--<script rel="script" type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>-->
<script rel="script" type="text/javascript" src="{{asset('js/datatable.js')}}"></script>
<script rel="script" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js"></script>
<script rel="script" type="text/javascript" src="{{asset('js/masonry.pkgd.min.js')}}"></script>


<!-- Initialization script -->
<script rel="script" type="text/javascript" src="{{asset('js/admin.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('js/page-scripts/table-custom-elements.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('js/init.js')}}"></script>

</body>
</html>
