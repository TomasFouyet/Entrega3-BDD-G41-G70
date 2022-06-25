<?php error_reporting (0);?>
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


<!-- Filtro fecha -->
<?php
    require("config/conection.php");
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
    if (empty($fecha1)){
        $query2 = "SELECT DISTINCT codigo,codigo_compania,estado,fecha_salida,fecha_llegada FROM tipo_vuelo AS tv, propuesta_de_vuelo AS pdv
                   WHERE tv.id_extra = pdv.id_extra;";
        $result2 = $db -> prepare($query2);
        $result2 -> execute();
        $viajes = $result2 -> fetchAll();
    }
    else{
        $query2 = "SELECT DISTINCT codigo,codigo_compania,estado,fecha_salida,fecha_llegada FROM tipo_vuelo AS tv, propuesta_de_vuelo AS pdv
               WHERE tv.fecha_salida >= '$fecha1' AND tv.fecha_llegada <= '$fecha2' AND tv.id_extra = pdv.id_extra;";
        $result2 = $db -> prepare($query2);
        $result2 -> execute();
        $viajes = $result2 -> fetchAll();

    }
?>



<table align='center' class="table is-striped">
    <tr>
        <th>Codigo De Vuelo</th>
        <th>Codigo De La Compañia</th>
        <th>Estado Del Vuelo</th>
        <th>Fecha Salida</th>
        <th>Fecha Llegada</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    foreach($viajes as $viaje){
        if($viaje[2] == 'pendiente') {
            echo "<tr>
                    <td>$viaje[0]</td>
                    <td>$viaje[1]</td>
                    <td>$viaje[2]</td>
                    <td>$viaje[3]</td>
                    <td>$viaje[4]</td>
                    <td><button>Aceptar</button></td>
                    <td><button>Rechazar</button></td>
                </tr>";
        }
    }
    ?>
</table>

