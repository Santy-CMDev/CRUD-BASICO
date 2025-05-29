<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link<?php if (basename($_SERVER['PHP_SELF']) == 'index.php')
                            echo ' active'; ?>"
                            href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php if (basename($_SERVER['PHP_SELF']) == 'info.php')
                            echo ' active'; ?>"
                            href="info.php">Información</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 text-center">
        <h2>Información del Proyecto</h2>
        <p>Este es un CRUD básico desarrollado en PHP y Bootstrap.</p>
        <ul>
            <li>Permite registrar, modificar y eliminar personas.</li>
            <li>Utiliza una base de datos MySQL.</li>
            <li>Desarrollado como práctica para aprender PHP y Bootstrap.</li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>