<?php error_reporting (0);?>

<?php
    require("config/conection.php");
    $usuario = $_GET["usuario"];
    // Pasajeros 
    $query = "SELECT p.pasaporte_pasajero,r.codigo_reserva,p.numero_ticket,p.numero_asiento,p.clase,p.comida_y_maleta FROM pasajeros AS p, reservas AS r 
              WHERE r.reserva_id = p.reserva_id ;";
    // AND p.pasaporte_pasajero = '$usuario'
    $result = $db2 -> prepare($query);
    $result -> execute();
    $fechas = $result -> fetchAll();
?>

<table align='center' class="table is-striped">
    <tr>
        <th>Número Pasaporte</th>
        <th>Codigo De Reserva</th>
        <th>Número Ticket</th>
        <th>Número de Asiento</th>
        <th>Clase</th>
        <th>Comida Maleta</th>
    </tr>
    <?php
    foreach($fechas as $fecha){
      echo "<tr>
              <td>$fecha[0]</td>
              <td>$fecha[1]</td>
              <td>$fecha[2]</td>
              <td>$fecha[3]</td>
              <td>$fecha[4]</td>
              <td>$fecha[5]</td>
          </tr>";
    }
    ?>
</table>

<h1> ¿Quieres Realizar una Reserva? </h1>

<?php
    // Con eta query encuentro los paises de origen
    $query1 = "SELECT DISTINCT(nombre_ciudad) 
               FROM tipo_vuelo as tv, propuesta_de_vuelo as pdv, fpl, operacion_salida as os, aerodromos as a
               WHERE tv.id_extra = pdv.id_extra AND tv.estado = 'aceptado' AND fpl.id_extra = pdv.id_extra
               AND os.fpl_id = fpl.fpl_id AND a.aerodromo_id = os.aerodromo_despegue;";
    $result1 = $db -> prepare($query1);
    $result1 -> execute();
    $paises = $result1 -> fetchAll();

    // COn esta query encuentro los paises de destino
    $query2 = "SELECT DISTINCT(nombre_ciudad) 
               FROM tipo_vuelo as tv, propuesta_de_vuelo as pdv, fpl, operacion_llegada as ol, aerodromos as a
               WHERE tv.id_extra = pdv.id_extra AND tv.estado = 'aceptado' AND fpl.id_extra = pdv.id_extra
               AND ol.fpl_id = fpl.fpl_id AND a.aerodromo_id = ol.aerodromo_arribo;";
    $result2 = $db -> prepare($query2);
    $result2 -> execute();
    $paises2 = $result2 -> fetchAll();


?>

<form method="post">
      <br>
      <br>
      <div class="container">
          <label for="origen">Ciudad de origen</label>
          <select name="origen">
              <?php foreach($paises as $pais){ ?>
                  <option> <?php echo $pais[0]; ?> </option> <?php } ?>
          </select>
      </div>
      <div class="container">
          <label for="destino">Ciudad de Destino</label>
          <select name="destino">
              <?php foreach($paises2 as $pais2){ ?>
                  <option> <?php echo $pais2[0]; ?> </option> <?php } ?>
          </select>
      </div>
      <div class="container">
        <label for="fecha"><b>Fecha de Salida</b></label>
        <input type="date" placeholder="Fecha" name="fecha">
      </div>
      <div class="container"><button type="submit">Buscar</button>
      </div>
</form>


<?php
  $origen = $_POST["origen"];
  $destino = $_POST["destino"];
  $fecha = $_POST["fecha"];
  echo $origen;

  // Despegue
  $query3 = "SELECT a.nombre_ciudad, tv.fecha_salida, tv.codigo
             FROM aerodromos as a,  tipo_vuelo as tv;
             WHERE a.nombre_ciudad = '$origen' and tv.estado = 'aceptado' and a.aerodromo_id = a.aerodromo_salida_id and CONVERT(VARCHAR(25),tv.fecha_salida,126) LIKE '$fecha';";
  $result3 = $db -> prepare($query3);
  $result3 -> execute();
  $filtros = $result3 -> fetchAll();

  // Llegada
  $query4 = "SELECT a.nombre_ciudad, tv.fecha_llegada, tv.codigo
             FROM aerodromos as a,  tipo_vuelo as tv;
             WHERE a.nombre_ciudad = '$destino' and tv.estado = 'aceptado' and a.aerodromo_id = a.aerodromo_llegada_id;";
  $result4 = $db -> prepare($query4);
  $result4 -> execute();
  $filtros2 = $result4 -> fetchAll();

  $query5 = "SELECT *
             FROM $filtros as f,$filtros2 as f2;
             WHERE f.codigo = f2.codigo;";

  $result5 = $db -> prepare($query5);
  $result5 -> execute();
  $filtros3 = $result4 -> fetchAll();




?>


<table align='center' class="table is-striped">
    <tr>
        <th>Nombre_ciudad</th>
        <th>Nombre_ciudad2</th>
        <th>Nombre_ciudad</th>

    </tr>
    <?php
    foreach($filtros as $filtro3){
      echo "<tr>
              <td>$filtro[0]</td>
              <td>$filtro[1]</td>
              <td>$filtro[2]</td>

          </tr>";
    }
    ?>
</table>


<table align='center' class="table is-striped">
    <tr>
        <th>Nombre_ciudad</th>

    </tr>
    <?php
    foreach($filtros2 as $filtro){
      echo "<tr>
              <td>$filtro[0]</td>
              <td>$filtro[1]</td>
              <td>$filtro[2]</td>

          </tr>";
    }
    ?>
</table>