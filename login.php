<?php
include 'config/conexion.php'; // Incluye el archivo de conexión a la base de datos

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Uso de consultas preparadas para evitar inyección SQL
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['usuario'] = $usuario['nombre_usuario'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

        // Redirigir a la página del menú
        header("Location: menu.php");
        exit;
    } else {
        echo "Correo o contraseña incorrectos.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Método no permitido.";
}
?>

