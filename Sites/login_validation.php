<?php
	ob_start();
	session_start();
?>

<?php
    require("config/conetion.php");
    $msg = '';
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $name = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT id_usuario, username, pasaword, tipo FROM Usuarios WHERE username = '$name' AND contraseña = '$password'";
        $result = $db2 -> prepare($query);
    	$result -> execute();
	    $resultados = $result -> fetchAll();
        if(empty($resultados)) {
            $msg = "Tabla usuarios vacia";
            header("Location: index.php?msg=$msg");
            exit();
           } 
        else {
           foreach($resultados as $resultado) {
           $user = $resultado[1];
           $tipo = $resultado[3];
         }
            if($tipo == 'Admin DGAC') {
                echo "<script>location.href='navegacion_admin.php?';</script>";
                exit();
            }
            elseif($tipo == 'Compania Aerea') {
                echo "<script>location.href='navegacion_compania.php?usuario=$user';</script>";
                exit();
            }
            elseif ($tipo == 'Pasajero') {
                echo "<script>location.href='navegacion_pasajeros.php?usuario=$user';</script>";
                exit();
            }
            else {
                $msg = "Error en usuario";
                header("Location: index.php?msg=$msg");
                exit();
            }
            exit();
            }

        $msg = "Sesión iniciada correctamente";
        header("Location: index.php?msg=$msg");
    }
?>
