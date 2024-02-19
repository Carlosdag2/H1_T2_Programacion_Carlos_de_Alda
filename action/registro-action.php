<?php
include '../config/config.php';
global $conexion_mysql;

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];


// Verificar si el correo ya está en uso
$sql_verificar_correo = "SELECT COUNT(*) as total FROM usuarios WHERE email = ?";
$stmt_verificar_correo = $conexion_mysql->prepare($sql_verificar_correo);
$stmt_verificar_correo->execute([$correo]);
$resultado_verificar_correo = $stmt_verificar_correo->fetch(PDO::FETCH_ASSOC);

if ($resultado_verificar_correo['total'] > 0) {
    // Mostrar mensaje emergente
    echo '<script>alert("El correo electrónico ya tiene una cuenta asociada. Por favor, inicie sesión."); window.location.href = "../vista/login.php";</script>';
} else {
    // Cifrar la contraseña
    $contrasena_cifrada = password_hash($contrasena, PASSWORD_BCRYPT, ['cost' => 12]);

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";
    $stmt = $conexion_mysql->prepare($sql);

    try {
        $stmt->execute([$nombre, $correo, $contrasena_cifrada]);
        // Mostrar mensaje emergente
        echo '<script>alert("Usuario registrado correctamente"); window.location.href = "../vista/login.php";</script>';
    } catch (PDOException $e) {
        echo 'Error al registrar el usuario: ' . $e->getMessage();
    }
}
?>
