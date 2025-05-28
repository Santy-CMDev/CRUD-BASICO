<?php

include 'Modelo/conexion.php';

$id = $_GET['id'];
$sql = $conexion->query("SELECT * FROM registros WHERE id_persona = '$id'");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <form class="col-4 p-3 m-auto" method="post">

        <h5 class="text-center text-secondary"> Modificar datos</h5>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

        <?php

        include 'Controlador/modificar_datos.php';

        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido; ?>"">
            </div>

            <div class=" mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="<?= $datos->dni; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha_nac; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="text" \ class="form-control" name="correo" value="<?= $datos->correo; ?>">
            </div>

        <?php }

        ?>

        <button type="submit" class="btn btn-primary" name="modificar" value="ok">Modificar datos</button>
    </form>
</body>

</html>