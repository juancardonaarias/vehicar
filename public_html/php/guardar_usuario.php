<?php
require_once 'conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $nombre, $email, $password);

if ($stmt->execute()) {
    header("Location: ../login.html?mensaje=registro_exitoso");
    exit();
} else {
    echo "Error al registrar el usuario: " . $stmt->error;
}
?>
