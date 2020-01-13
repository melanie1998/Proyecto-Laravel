
<h1>ACTUALIZACIÓN DE INCIDENCIA enviada por el/la administrador/a {{Auth::user()->name}}</h1>

<table border="1px" style="text-align:center;">
                           

    <tr>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Nombre del profesor</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Fecha</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Aula</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Codigo de incidencia</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Especificacion</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Equipo afectado</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Id del profesor</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Estado</th>
        <th style="background-color:orangered; padding:5px 5px 5px 5px;">Comentarios del admin</th>

    </tr>
    <tr>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->nombreProfesor}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->fechaIncidencia}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->aula}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->codigoIncidencia}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->especificacion}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->equipo}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->profesorId}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->estado}}</td>
        <td style="background-color:white; padding:5px 5px 5px 5px; width:5%;">{{$datos->comentarios}}</td>

    </tr>


</table>
