
<h1>DATOS DE LA INCIDENCIA MODIFICADA enviada por {{$datos->nombreProfesor}}</h1>

<table border="1px" style="text-align:center;">
                           

    <tr>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">ID</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Nombre del profesor</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Fecha</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Aula</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Codigo de incidencia</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Especificacion</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Equipo afectado</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Id del profesor</th>

    </tr>
    <tr>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$id}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->nombreProfesor}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->fechaIncidencia}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->aula}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->codigoIncidencia}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->especificacion}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->equipo}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->profesorId}}</td>

    </tr>


</table>
