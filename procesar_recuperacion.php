<?php
  include 'config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    // Conectar a la base de datos
    require 'config/conexion.php';

    // Verificar si el usuario existe
$stmt = $conn->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("El usuario no existe.");
}

$row = $result->fetch_assoc();
$id_usuario = $row['id_usuario'];

// Generar un token único


    // Verificar si el correo existe
    $stmt = $conn->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $token = bin2hex(random_bytes(32)); // Generar un token único

        // Guardar el token en la base de datos
        $stmt = $conn->prepare("INSERT INTO restablecimiento_contrasena (id_usuario, token, fecha_expiracion) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
        $stmt->bind_param("is", $id_usuario, $token);
        $stmt->execute();

        // Enviar correo con el enlace
        $url = "http://mecanicapp.com/nueva_contrasena.php?token=$token";
        $mensaje = "Haz solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para restablecerla: $url";

        // Usar una librería como PHPMailer para enviar el correo
        mail($email, "Restablecer contraseña", $mensaje);

        echo "Revisa tu correo para restablecer tu contraseña.";
    } else {
        echo "No existe una cuenta asociada a este correo.";
    }
}
?>
