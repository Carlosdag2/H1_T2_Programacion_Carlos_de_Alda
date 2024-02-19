<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../vista/login.php');
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Crear una nueva conexión PDO
        include '../config/config.php';
        global $conexion_mysql;

        $usuario_id = $_SESSION['usuario_id'];

        // Preparar la declaración SQL para insertar la entrada
        $stmt = $conexion_mysql->prepare("INSERT INTO entradas (usuario_id, titulo, contenido, fecha_publicacion, imagen) VALUES (?, ?, ?, ?, ?)");

        // Procesar la imagen si se cargó correctamente
        if (isset($_FILES['postImage']) && $_FILES['postImage']['error'] == 0) {
            // Verificar el tipo de archivo
            $permitidos = array("image/jpeg", "image/png", "image/gif");
            if (in_array($_FILES['postImage']['type'], $permitidos)) {
                // Leer el contenido de la imagen
                $imagen_contenido = file_get_contents($_FILES['postImage']['tmp_name']);

                // Ejecutar la declaración SQL para insertar la entrada
                $stmt->bindParam(1, $usuario_id);
                $stmt->bindParam(2, $_POST['postTitle']);
                $stmt->bindParam(3, $_POST['postContent']);
                $stmt->bindParam(4, $_POST['postDate']);
                $stmt->bindParam(5, $imagen_contenido, PDO::PARAM_LOB);
                $stmt->execute();

                echo '<script>alert("¡Gracias! Tu post de blog ha sido enviado correctamente."); window.location.href = "../vista/entradas.php";</script>';
            } else {
                echo "<div class='alert alert-warning'>El formato de archivo de imagen no es válido. Por favor, sube una imagen en formato JPEG, PNG o GIF.</div>";
                echo '<script>alert("El formato de archivo de imagen no es válido. Por favor, sube una imagen en formato JPEG, PNG o GIF."); window.location.href = "../vista/blog.php";</script>';
            }
        } else {
            // Manejar el caso en que no se cargó ningún archivo
            echo "<div class='alert alert-warning'>No se cargó ninguna imagen.</div>";
        }
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>
