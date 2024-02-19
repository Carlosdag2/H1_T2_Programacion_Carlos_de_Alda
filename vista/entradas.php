<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones de Usuarios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- CSS personalizado -->
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1 class="mt-5">Publicaciones de Usuarios</h1>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 text-center mb-3">
            <a href="../vista/blog.php" class="btn btn-primary">Publicar Nueva Entrada</a>
        </div>
        <div class="col-md-6 text-center mb-3">
            <a href="../action/logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <?php
            include '../action/entradas-action.php';
            ?>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
