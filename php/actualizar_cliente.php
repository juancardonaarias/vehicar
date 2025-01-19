<?php
include '../config/conexion.php'; // Conexión a la base de datos

// Obtener datos del formulario
$id_propietario = isset($_POST['id_propietario']) ? intval($_POST['id_propietario']) : null;
$nombre = isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

// Validar que los datos existan
if (!$id_propietario || empty($nombre) || empty($telefono) || empty($email)) {
    die("Error: datos incompletos. Por favor verifica el formulario.");
}

// Consultar el ID de usuario asociado al propietario
$query_usuario = "SELECT id_usuario FROM propietario WHERE id_propietario = ?";
$stmt_usuario = $conn->prepare($query_usuario);
$stmt_usuario->bind_param("i", $id_propietario);

if (!$stmt_usuario->execute()) {
    die("Error al obtener usuario: " . $stmt_usuario->error);
}

$result_usuario = $stmt_usuario->get_result();
$usuario = $result_usuario->fetch_assoc();

if (!$usuario) {
    die("Error: No se encontró un usuario asociado al propietario con ID: $id_propietario.");
}

$id_usuario = $usuario['id_usuario']; // ID del usuario asociado

// Actualizar datos en la tabla usuarios
$query_update = "UPDATE usuarios SET nombre_usuario = ?, telefono = ?, email = ? WHERE id_usuario = ?";
$stmt_update = $conn->prepare($query_update);
$stmt_update->bind_param("sssi", $nombre, $telefono, $email, $id_usuario);

if ($stmt_update->execute()) {
    echo "<script>
                alert('Cliente actualizado con éxito');
                window.location.href = '../menu.php';
                </script>";
                exit; 
} else {
    die("Error al actualizar datos: " . $stmt_update->error);
}
?>

