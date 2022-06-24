<?php
    // Esta parte lo que hace es importar la funcion q crea el admin 
    require("config/conection.php");

    $query = "SELECT crear_admin_DGAC();";

    $result = $db2 -> prepare($query);
    $result -> execute();
    // $personas = $result -> fetchAll();

    // Esta parte nos entrega las compañias
    $query = "SELECT * FROM vuelos;";

    $result -> execute();
    $companias_aereas = $result -> fetchAll();

    foreach ($companias_aereas as $compania){
        $query = "SELECT crear_compania_usuario('$compania[0]', '$compania[5]');";

        $result = $db2 -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
    }

    // Esta parte nos entrega las persona/pasajeros

    $query = "SELECT * FROM pasajeros;";
    
    $result -> execute();
    $pasajeros = $result -> fetchAll();

    foreach ($pasajeros as $pasajero){
        $query = "SELECT crear_pasajero_usuario('$pasajero[0]', '$pasajero[3]');";

        $result = $db2 -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
    }
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