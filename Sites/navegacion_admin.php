<?php


    $query1 = "SELECT * FROM tipo_vuelo AS tv, propuesta_de_vuelo AS pdv 
               WHERE tv.id_extra = pdv.id_extra;";
    $result1 = $db -> prepare($query1);
    $result1 -> execute();
    $propuestas = $result1 -> fetchAll();


?>





<table align='center' class="table is-striped">
    <tr>
        <th>Codigo De Vuelo</th>
        <th>Codigo De La Compañia</th>
        <th>Estado Del Vuelo</th>
        <th>Fecha Salida</th>
        <th>Fecha Llegada</th>
        <th>Id aerodromo salida</th>
        <th>Id aerodromo llegada</th>

    </tr>
    <?php
    foreach($propuestas as $propuesta){
        if($propuesta[0] == 'pendiente') {
            echo "<tr><td>$propuesta[1]</td><td>$propuesta[9]</td><td>$propuesta[0]</td><td>$propuesta[2]</td><td>$propuesta[3]</td><td>$propuesta[4]</td><td>$propuesta[5]</td></tr>";
        }
    }
    ?>
</table>