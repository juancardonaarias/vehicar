<?php
// Incluir la conexión a la base de datos
require_once '../config/conexion.php';

$rutaConexion = realpath('../config/conexion.php');
if ($rutaConexion !== false) {
    require_once $rutaConexion;
} else {
    die("No se puede encontrar el archivo de conexión.");
}


error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Antes de obtener datos del formulario...<br>";
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre_propietario'];
    $telefono = $_POST['telefono_propietario'];
    $email = $_POST['email_propietario'];

    echo "Después de obtener datos del formulario...<br>";

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO propietario (nombre_propietario, telefono_propietario, email_propietario) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $nombre, $telefono, $email);

        // Ejecutar la consulta y verificar si fue exitosa
        if ($stmt->execute()) {
            header("Location: index.html?mensaje=guardado");
            exit();
        } else {
            echo "Error al guardar los datos: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>
