<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../vista/login.php');
    exit();
}
try {
    // Crear una nueva conexión PDO
    include '../config/config.php';
    global $conexion_mysql;

    // Consultar las publicaciones desde la base de datos
    $stmt = $conexion_mysql->query("SELECT entradas.*, usuarios.nombre as autor_nombre FROM entradas INNER JOIN usuarios ON entradas.usuario_id = usuarios.id ORDER BY fecha_publicacion DESC");

    // Verificar si se obtuvieron resultados
    if ($stmt) {
        // Obtener las publicaciones como un array asociativo
        $entradas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($entradas as $entrada) {
            // Aquí puedes acceder a los datos de cada entrada
            $titulo = $entrada['titulo'];
            $contenido = $entrada['contenido'];
            $fecha_publicacion = $entrada['fecha_publicacion'];
            $autor_nombre = $entrada['autor_nombre'];
            $imagen_contenido = $entrada['imagen'];

            // Puedes usar estos datos para mostrar cada entrada en tu HTML
            echo '<div class="row justify-content-center align-items-center">';
            echo '    <div class="card mb-4 shadow-sm">';
            echo '        <div class="card-body text-center">'; // Nuevo contenedor con clase "text-center"
            echo '            <div style="display: inline-block;">'; // Nuevo contenedor con estilo para centrar la imagen
            echo '                <img src="data:image/jpeg;base64,' . base64_encode($imagen_contenido) . '" style="width: 500px;" alt="Imagen">'; // Estilo para asegurar que la imagen no desborde la tarjeta
            echo '            </div>';
            echo '<br> <br> <br>';
            echo '            <h5 class="card-title">' . $titulo . '</h5>';
            echo '            <p class="card-text">' . $contenido . '</p>';
            echo '            <small class="text-muted">Publicado el ' . $fecha_publicacion . ' por ' . $autor_nombre . '</small>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }

    } else {
        // Si hay un error en la consulta, mostrar un mensaje de error
        echo "Error al obtener las publicaciones de la base de datos.";
    }
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>
