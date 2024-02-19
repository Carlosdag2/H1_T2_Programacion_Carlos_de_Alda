<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <title>Login de usuarios</title>
</head>
<body>
<div class="container">
    <h2 class="mt-5">Login de usuarios</h2>
    <form method="post" action="../action/login-action.php" class="mt-3">
        <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" name="correo" class="form-control" id="correo" required>
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" class="form-control" id="contrasena" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        <a href="../vista/registro.php" class="btn btn-secondary">Registrarse</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

