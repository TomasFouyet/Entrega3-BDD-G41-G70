<?php
    require("../config/conection.php");

    $query = "SELECT * FROM trabajadores;";

    $result = $db2 -> prepare($query);
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