<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Conectar a la base de datos
    include '../config/config.php';
    global $conexion_mysql;

    $sql = "SELECT id, email, contrasena FROM usuarios WHERE email = :correo";
    $stmt = $conexion_mysql->prepare($sql);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Verificar si la contraseña coincide utilizando password_verify
        if (password_verify($contrasena, $result['contrasena'])) {
            // Iniciar sesión y almacenar el ID del usuario en $_SESSION
            $_SESSION['usuario_id'] = $result['id'];
            header('Location: ../vista/entradas.php');
            exit;
        } else {
            echo '<script>alert("Usuario o contraseña incorrectos."); window.location.href = "../vista/login.php";</script>';
        }
    } else {
        echo '<script>alert("Usuario no válido."); window.location.href = "../vista/login.php";</script>';
    }
}
?>
