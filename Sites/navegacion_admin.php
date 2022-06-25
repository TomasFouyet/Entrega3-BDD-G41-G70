<?php
    require("config/conection.php");

    $query1 = "SELECT * FROM tipo_vuelo AS tv, propuesta_de_vuelo AS pdv 
               WHERE tv.id_extra = pdv.id_extra;";
    $result1 = $db -> prepare($query1);
    $result1 -> execute();
    $propuestas = $result1 -> fetchAll();


?>
<!-- Esto de Aqui todavia no esta funcionando, tenemos que ver como hacerlo funcionar -->
<h2 align="center"> Buscar Vuelo por fechas:</h2>
  <form align="center" method="post">
    Ingrese las fechas:
    <input type="date" name="fecha1"> a <input type="date" name="fecha2">
    <br>
    <input button class="button is-link" type="submit" value="Buscar">
    <br/><br/>
</form>
<?php
    require("../config/conexion.php"); 
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
    $query2 = "SELECT * FROM tipo_vuelo AS tv, propuesta_de_vuelo AS pdv
               WHERE tv.fecha_salida >= '$fecha1' AND tv.fecha_llegada <= '$fecha2';";
    $result2 = $db -> prepare($query2);
    $result2 -> execute();
    $viajes = $result2 -> fetchAll();
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
            echo "<tr>
                    <td>$propuesta[1]</td>
                    <td>$propuesta[9]</td>
                    <td>$propuesta[0]</td>
                    <td>$propuesta[2]</td>
                    <td>$propuesta[3]</td>
                    <td>$propuesta[4]</td>
                    <td>$propuesta[5]</td>
                </tr>";
        }
    }
    ?>
</table>