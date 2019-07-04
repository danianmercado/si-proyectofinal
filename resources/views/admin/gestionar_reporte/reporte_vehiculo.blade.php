<!DOCTYPE html>
<html>
<title>Reporte vehiculos </title>
<head>
    <style>
        table{
            font-family:arial,sans-serif;
            border-collapse:collapse;
            width:100%;
        }
        td,th{
            border:1px solid #dddddd;
            text-align: left;
            padding:8px;
        }
        tr:nth-child(even){
            background-color:#dddddd;
        }
    </style>
</head>
<body>
<h2>Reporte de vehiculos</h2>
<table>
    <tr>
        <th>Id</th>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Cliente</th>
        <th>Total Ingresos</th>
    </tr>
    @foreach($allVehiculos as $vehiculo)
    <tr>
        <td>{{$vehiculo->id}}</td>
        <td>{{$vehiculo->placa}}</td>
        <td>{{$vehiculo->marca}}</td>
        <td>{{$vehiculo->modelo}}</td>
        <td>{{$vehiculo->nombre}}</td>
        <td>{{$vehiculo->totalIngresos}}</td>
    </tr>
        @endforeach
</table>
</body>
</html>
