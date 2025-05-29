<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD BASICO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d44f13817.js" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CRUD Básico</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link<?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo ' active'; ?>" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php if(basename($_SERVER['PHP_SELF'])=='info.php') echo ' active'; ?>" href="info.php">Información</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>

    let eliminar = () => {
        return confirm("¿Estas seguro de eliminar este registro?");
    }
</script>

    <h1 class="text-center p-3">CRUD BASICO</h1>
    <?php
    include 'Modelo/conexion.php';
    include 'Controlador/eliminar_registro.php';
    ?>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="post">

            <h3 class="text-center text-secondary"> Registro</h3>
            <?php
            include 'Controlador/registro_personas.php';
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="text" \ class="form-control" name="correo">
            </div>

            <button type="submit" class="btn btn-primary" name="registrar" value="ok">Enviar datos</button>
        </form>

        <div class="col-8 p-4">

            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">DNI</th>
                        <th scope="col">FECHA DE NACIMIENTO</th>
                        <th scope="col">CORREO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'Modelo/conexion.php';
                    $sql = $conexion->query("select * from registros");

                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id_persona ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->dni ?></td>
                            <td><?= $datos->fecha_nac ?></td>
                            <td><?= $datos->correo ?></td>
                            <td><a href="modificar_registro.php?id=<?= $datos->id_persona ?>"
                                    class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_persona ?>"
                                    class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>


                </tbody>
            </table>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>

</body>

</html>