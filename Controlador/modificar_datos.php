<?php

if (!empty($_POST['modificar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['fecha']) && !empty($_POST['correo'])) {

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $fecha = $_POST['fecha'];
        $correo = $_POST['correo'];

        $sql = $conexion->query("UPDATE registros SET nombre = '$nombre', apellido = '$apellido', dni = $dni, fecha_nac = '$fecha', correo = '$correo' WHERE id_persona = $id");
        if ($sql == 1) {
            header("Location: index.php?mensaje=modificado");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar</div>";
        }
        
    } else {
        echo "<div class='alert alert-warning'>Campos vacios</div>";
    }
}

?>