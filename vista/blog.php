<?php include '../action/conexion-db-meter-datos.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <title>Publicar un post de blog</title>
</head>
<body>
<div class="container">
    <h1>Publicar un post de blog</h1>

    <form method="post" action="../action/conexion-db-meter-datos.php" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="postTitle" class="form-label">Título</label>
            <input type="text" class="form-control" id="postTitle" name="postTitle" required>
        </div>

        <div class="mb-3">
            <label for="postContent" class="form-label">Contenido</label>
            <textarea class="form-control" id="postContent" name="postContent" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="postImage" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="postImage" name="postImage" required>
        </div>

        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</div>

<!-- JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
