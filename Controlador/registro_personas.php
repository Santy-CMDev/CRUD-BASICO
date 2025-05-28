<?php

if (!empty(($_POST["registrar"]))) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) && !empty($_POST["fecha"]) && !empty($_POST["correo"])) {

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];

        $sql = $conexion->query("INSERT INTO registros (nombre, apellido, dni, fecha_nac, correo) VALUES ('$nombre', '$apellido', $dni, '$fecha', '$correo')");
        if ($sql=1){
            echo '<div class="alert alert-success">Registrado correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Error al registrar</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Faltan campos por completar</div>';
    }
}
?>