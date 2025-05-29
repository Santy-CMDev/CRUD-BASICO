<?php
include 'Modelo/conexion.php';

$id = $_GET['id'];
$sql = $conexion->query("SELECT * FROM registros WHERE id_persona = '$id'");

// Agregar nueva dirección
if (isset($_POST['agregar_direccion'])) {
    $direccion = $_POST['direccion'];
    $id_persona = $_POST['id_persona'];
    $conexion->query("INSERT INTO direccion_usu (id_persona, direccion) VALUES ('$id_persona', '$direccion')");
    header("Location: modificar_registro.php?id=$id_persona");
    exit();
}

if (isset($_GET['eliminar_direccion'])) {
    $id_direccion = $_GET['eliminar_direccion'];
    $conexion->query("DELETE FROM direccion_usu WHERE id_direccion = '$id_direccion'");
    header("Location: modificar_registro.php?id=$id");
    exit();
}

if (isset($_POST['actualizar_direccion'])) {
    $id_direccion = $_POST['id_direccion'];
    $nueva_direccion = $_POST['nueva_direccion'];
    $conexion->query("UPDATE direccion_usu SET direccion = '$nueva_direccion' WHERE id_direccion = '$id_direccion'");
    header("Location: modificar_registro.php?id=$id");
    exit();
}
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
        <h5 class="text-center text-secondary">Modificar datos</h5>
        <input type="hidden" name="id" value="<?= $id ?>">
        <?php
        include 'Controlador/modificar_datos.php';
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="<?= $datos->dni; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha_nac; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo" value="<?= $datos->correo; ?>">
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary" name="modificar" value="ok">Modificar datos</button>
    </form>

    <form class="col-4 p-3 m-auto" method="post" action="">
        <h5 class="text-center text-secondary">Agregar dirección</h5>
        <input type="hidden" name="id_persona" value="<?= $id ?>">
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" required>
        </div>
        <button type="submit" class="btn btn-success" name="agregar_direccion" value="ok">Agregar dirección</button>
    </form>

    <div class="col-6 p-3 m-auto">
        <h5 class="text-center text-secondary">Direcciones registradas</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Dirección</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $editar_id = isset($_GET['editar_direccion']) ? $_GET['editar_direccion'] : null;
                $direcciones = $conexion->query("SELECT * FROM direccion_usu WHERE id_persona = '$id'");
                while ($dir = $direcciones->fetch_object()) { ?>
                    <tr>
                        <td><?= $dir->id_direccion ?></td>
                        <td>
                            <?php if ($editar_id == $dir->id_direccion) { ?>
                                <form method="post" action="">
                                    <input type="hidden" name="id_direccion" value="<?= $dir->id_direccion ?>">
                                    <input type="text" name="nueva_direccion" value="<?= $dir->direccion ?>" class="form-control" required>
                            <?php } else { ?>
                                <?= $dir->direccion ?>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($editar_id == $dir->id_direccion) { ?>
                                    <button type="submit" name="actualizar_direccion" class="btn btn-success btn-sm">Guardar</button>
                                    <a href="modificar_registro.php?id=<?= $id ?>" class="btn btn-secondary btn-sm">Cancelar</a>
                                </form>
                            <?php } else { ?>
                                <a href="modificar_registro.php?id=<?= $id ?>&editar_direccion=<?= $dir->id_direccion ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="modificar_registro.php?id=<?= $id ?>&eliminar_direccion=<?= $dir->id_direccion ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta dirección?')">Eliminar</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>