<?php
require 'config/conexion.php';
require 'vendor/autoload.php'; // Incluye PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Verificar si el correo existe en la base de datos
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
    $token = bin2hex(random_bytes(32));

    // Guardar el token en la base de datos con una fecha de expiración
    $stmt = $conn->prepare("INSERT INTO restablecimiento_contrasena (id_usuario, token, fecha_expiracion) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
    $stmt->bind_param("is", $id_usuario, $token);
    $stmt->execute();

    // Crear el enlace para restablecer la contraseña
    $url = "http://mecanicapp.com/nueva_contrasena.php?token=$token";
    $mensaje = "Haz solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para restablecerla: $url";

    // Configurar PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambiar según el proveedor de correo
        $mail->SMTPAuth = true;
        $mail->Username = 'mecanica@mecanicapp.com.co'; // Tu correo
        $mail->Password = 'Jjmscg123692*'; // Contraseña o contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('mecanica@mecanicapp.com.co', 'MecanicApp'); // Cambiar según tu configuración
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Restablecer contraseña';
        $mail->Body = $mensaje;

        // Enviar el correo
        $mail->send();
        echo "Revisa tu correo para restablecer tu contraseña.";
    } catch (Exception $e) {
        echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
    }
}
?>
