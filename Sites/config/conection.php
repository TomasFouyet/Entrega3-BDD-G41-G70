<?php
  try {
    #Pide las variables para conectarse a la base de datos.
    require('data.php');
    # Se crea la instancia de PDO
    $db_70 = new PDO("pgsql:dbname=$db_name_70;host=localhost;port=5432;user=$user_70;password=$password_70");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
  try {
    require('data.php');
    $db_41 = new PDO("pgsql:dbname=$db_name_41;host=localhost;port=5433;user=$user_41;password=$password_41");
    } catch (Exception $e) {
      echo "No se pudo conectar a la base de datos: $e";
    }
?>