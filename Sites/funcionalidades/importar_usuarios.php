<?php
require("../config/conexion.php");

$query = "SELECT trabajador_id, nombre, pasaporte 
          FROM trabajadores;";
$result = $db_41 -> prepare($query);
$result -> execute();
$personas = $result -> fetchAll();
?>

<table align='center' class="table is-striped">
    <tr>
        <th>Id de usuario</th>
        <th>Nombre</th>
        <th>Pasaporte</th>
    </tr>
    <?php
    foreach($personas as $persona){
        echo "<tr><td>$persona[0]</td><td>$persona[1]</td><td>$persona[2]</td></tr>";
    }
    ?>
</table>