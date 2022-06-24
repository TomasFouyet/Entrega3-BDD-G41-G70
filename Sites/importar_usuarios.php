<?php
    require("config/conection.php");

    // Generar contraseñas

    $caracteres = "abcdefghijklmñopqrstuvwxyz123456789ABCDEFGHIJKLMÑOPQRSTUVWXYZ";
    $longitud = 10;

    // Creando usuario admin

    $query = "INSERT INTO Usuarios VALUES(0, 'DGAC', 'admin', 'Admin DGAC');";
    $result = $db2 -> prepare($query);
    $result -> execute();



    $contador = 1;
    // Esta parte nos entrega las compañias
    $query2 = "SELECT * FROM vuelos;";
    $result2 = $db2 -> prepare($query2);
    $result2 -> execute();
    $companias_aereas = $result2 -> fetchAll();
    $array_vacio = array(); // Lista de nombre de compañias para no añadir duplicadas

    foreach ($companias_aereas as $compania)
    {   
        $query3 = "SELECT username FROM Usuarios;";
        $result3 = $db2 -> prepare($query3);
        $result3 -> execute();
        $usuarios = $result3 -> fetchAll();

        if(in_array($compania[5],$array_vacio)) //Para que no haya repetidos
        {
        }
        else
        {    
        $contraseña = substr(str_shuffle($caracteres), 0, $longitud);
        $query3 = "INSERT INTO Usuarios VALUES('$contador', '$compania[5]', '$contraseña', 'Compania Aerea');";

        $result3 = $db2 -> prepare($query3);
        $result3 -> execute();
        $result3 -> fetchAll();
        $contador = $contador + 1;
        array_push($array_vacio,$compania[5]);
        }

    }





    // Esta parte nos entrega las persona/pasajeros
    $query4 = "SELECT * FROM pasajeros;";
    $result4 = $db2 -> prepare($query4);
    $result4 -> execute();
    $pasajeros = $result4 -> fetchAll();
    $array_vacio2 = array(); // Lista de nombre de compañias para no añadir duplicadas

    foreach ($pasajeros as $pasajero)
    {
        $query5 = "SELECT username FROM Usuarios;";
        $result3 = $db2 -> prepare($query5);
        $result3 -> execute();
        $usuarios = $result3 -> fetchAll();

        if(in_array($pasajero[1],$array_vacio2)) //Para que no haya repetidos
        {
        }
        elseif ($pasajero[1] != "") 
        { 

        $searchString = " "; // Eliminar espacios del nombre
        $replaceString = ""; // Eliminar espacios del nombre

        $contraseña = substr(str_shuffle($pasajero[1].str_replace($searchString, $replaceString, $pasajero[6])), 0, $longitud);  

        $query5 = "INSERT INTO Usuarios VALUES('$contador', '$pasajero[1]', '$contraseña', 'Pasajero');";

        $result5 = $db2 -> prepare($query5);
        $result5 -> execute();
        $result5 -> fetchAll();
        $contador = $contador + 1;

        array_push($array_vacio2,$pasajero[1]);
        }
    }
?>







<?php
    // Visualizacion tabla compañia

    $query6 = "SELECT * FROM Usuarios;";
    $result6 = $db2 -> prepare($query6);
    $result6 -> execute();
    $usuarios = $result6 -> fetchAll();
?>
<table align='center' class="table is-striped">
    <tr>
        <th>Id de usuario</th>
        <th>Username</th>
        <th>Contraseña</th>
        <th>Tipo de Usuario</th>
    </tr>
    <?php
    foreach($usuarios as $usuario){
        echo "<tr><td>$usuario[0]</td><td>$usuario[1]</td><td>$usuario[2]</td><td>$usuario[3]</td></tr>";
    }
    ?>
</table>