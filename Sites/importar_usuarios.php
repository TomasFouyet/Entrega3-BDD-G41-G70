<?php
    // Esta parte lo que hace es importar la funcion q crea el admin 
    require("config/conection.php");

    $query = "INSERT INTO Usuarios VALUES(999, 'DGAC', 'admin', 'Admin DGAC');";

    $result = $db2 -> prepare($query);
    $result -> execute();
    //  $personas = $result -> fetchAll();

    // Esta parte nos entrega las compañias
    $query2 = "SELECT * FROM vuelos;";
    $result2 = $db2 -> prepare($query2);

    $result2 -> execute();
    $companias_aereas = $result2 -> fetchAll();

    foreach ($companias_aereas as $compania){
        $query3 = "INSERT INTO Usuarios VALUES('$compania[0]', '$compania[5]', '123456', 'Compania Aerea');";

        $result3 = $db2 -> prepare($query3);
        $result3 -> execute();
        $result3 -> fetchAll();
    }

    // Esta parte nos entrega las persona/pasajeros

    $query4 = "SELECT * FROM pasajeros;";
    
    $result4 -> execute();
    $pasajeros = $result4 -> fetchAll();

    foreach ($pasajeros as $pasajero){
        $query5 = "INSERT INTO Usuarios VALUES('$pasajero[0]', '$pasajero[3]', '123456', 'Pasajero');";

        $result5 = $db2 -> prepare($query5);
        $result5 -> execute();
        $result5 -> fetchAll();

    }
?>

<?php
    $query6 = "SELECT * FROM Usuarios;";
    $result6 = $db2 -> prepare($query6);

    $result6 -> execute();
    $usuarios = $result6 -> fetchAll();
?>
<table align='center' class="table is-striped">
    <tr>
        <th>Id de usuario</th>
        <th>Username</th>
        <th>Tipo de Usuario</th>
    </tr>
    <?php
    foreach($usuarios as $usuario){
        echo "<tr><td>$usuario[0]</td><td>$usuario[1]</td><td>$usuario[3]</td></tr>";
    }
    ?>
</table>