<?php error_reporting (0);?>

<?php
    require("config/conection.php");
    // Con eta query encuentro los paises de origen
    $query1 = "SELECT DISTINCT(nombre_pais) 
               FROM tipo_vuelo as tv, propuesta_de_vuelo as pdv, fpl, operacion_salida as os, aerodromos as a, pais_ciudad1 as pc
               WHERE tv.id_extra = pdv.id_extra AND tv.estado = 'aceptado' AND fpl.id_extra = pdv.id_extra
               AND os.fpl_id = fpl.fpl_id AND a.aerodromo_id = os.aerodromo_despegue AND a.nombre_ciudad = pc.nombre_ciudad;";
    $result1 = $db -> prepare($query1);
    $result1 -> execute();
    $paises = $result1 -> fetchAll();

    // COn esta query encuentro los paises de destino
    $query2 = "SELECT DISTINCT(nombre_pais) 
               FROM tipo_vuelo as tv, propuesta_de_vuelo as pdv, fpl, operacion_llegada as ol, aerodromos as a, pais_ciudad1 as pc
               WHERE tv.id_extra = pdv.id_extra AND tv.estado = 'aceptado' AND fpl.id_extra = pdv.id_extra
               AND ol.fpl_id = fpl.fpl_id AND a.aerodromo_id = ol.aerodromo_arribo AND a.nombre_ciudad = pc.nombre_ciudad;";
    $result2 = $db -> prepare($query2);
    $result2 -> execute();
    $paises2 = $result2 -> fetchAll();


?>

<form method="post">
      <br>
      <br>
      <div class="container">
        <form method="post">
            <label for="origen">Ciudad de origen</label>
            <select name="origen">
                <?php foreach($paises as $pais){ ?>
                    <option value="<?php $pais[0] ?>"> <?php echo $pais[0]; ?> </option> <?php } ?>
            </select>
        </form>
      </div>
      <div class="container">
        <form method="post">
            <label for="destino">Ciudad de Destino</label>
            <select name="destino">
                <?php foreach($paises2 as $pais2){ ?>
                    <option value="<?php $pais2[0] ?>"> <?php echo $pais2[0]; ?> </option> <?php } ?>
            </select>
        </form>
      </div>
      <div class="container">
        <label for="fecha"><b>Fecha de Salida</b></label>
        <input type="date" placeholder="Fecha" name="fecha">
      </div>
      <div class="container"><button type="submit">Buscar</button>
      </div>
  </form>

<?php
    
?>