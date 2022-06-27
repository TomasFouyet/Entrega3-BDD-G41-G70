<?php
    require("config/conection.php");
    $compania = $_GET["usuario"];

    $query1 = "SELECT DISTINCT codigo,codigo_compania,estado,fecha_salida,fecha_llegada FROM tipo_vuelo AS tv, propuesta_de_vuelo AS pdv 
               WHERE tv.id_extra = pdv.id_extra;";
    $result1 = $db -> prepare($query1);
    $result1 -> execute();
    $propuestas = $result1 -> fetchAll();


?>
<h3 align="center">Vuelos Aceptados</h3>
<table align='center' class="table is-striped">
    <tr>
        <th>Codigo De Vuelo</th>
        <th>Codigo De La Compañia</th>
        <th>Estado Del Vuelo</th>
        <th>Fecha Salida</th>
        <th>Fecha Llegada</th>
    </tr>
    <?php
    foreach($propuestas as $propuesta){
        if($propuesta[2] == 'aceptado' and $propuesta[1]== $compania) {
            echo "<tr>
                    <td>$propuesta[0]</td>
                    <td>$propuesta[1]</td>
                    <td>$propuesta[2]</td>
                    <td>$propuesta[3]</td>
                    <td>$propuesta[4]</td>
                </tr>";
        }
    }
    ?>
</table>

<h3 align="center">Vuelos Rechazados</h3>
<table align='center' class="table is-striped">
    <tr>
        <th>Codigo De Vuelo</th>
        <th>Codigo De La Compañia</th>
        <th>Estado Del Vuelo</th>
        <th>Fecha Salida</th>
        <th>Fecha Llegada</th>
    </tr>
    <?php
    foreach($propuestas as $propuesta){
        if($propuesta[2] == 'rechazado' and $propuesta[1]== $compania) {
            echo "<tr>
                    <td>$propuesta[0]</td>
                    <td>$propuesta[1]</td>
                    <td>$propuesta[2]</td>
                    <td>$propuesta[3]</td>
                    <td>$propuesta[4]</td>
                </tr>";
        }
    }
    ?>
</table>