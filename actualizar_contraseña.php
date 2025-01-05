<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $nueva_contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    // Conectar a la base de datos
    require 'config/conexion.php';

    // Verificar si el token es válido
    $stmt = $conn->prepare("SELECT user_id FROM restablecimiento_contrasena WHERE token = ? AND fecha_expiracion > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Actualizar la contraseña
        $stmt = $conn->prepare("UPDATE usuarios SET contrasena = ? WHERE id = ?");
        $stmt->bind_param("si", $nueva_contrasena, $user['user_id']);
        $stmt->execute();

        // Eliminar el token
        $stmt = $conn->prepare("DELETE FROM restablecimiento_contrasena WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();

        echo "Tu contraseña ha sido actualizada.";
    } else {
        echo "El enlace es inválido o ha expirado.";
    }
}
?>
