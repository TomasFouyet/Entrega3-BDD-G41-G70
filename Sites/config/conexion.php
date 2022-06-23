<?php
    try {
        require('data_70.php');
        require('data_41.php');
        $db_70 = new PDO("pgsql:dbname=$db_name_70;host=localhost;port=5432;user=$user_70;password=$password_70");
        $db_41 = new PDO("pgsql:dbname=$db_name_41;host=localhost;port=5432;user=$user_41;password=$password_41");
    } catch (Exception $e){
        echo "No se pudo conectar a la base de datos: $e";  
    }
?>