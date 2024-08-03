<?php
require_once '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_tipo, tipo FROM tipo_repuesto";
$result = $conn->query($sql);

$tipo_repuesto = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tipo_repuesto[] = $row;
    }
} else {
    echo json_encode(['error' => 'No se encontraron resultados.']);
    exit;
}

echo json_encode($tipo_repuesto);
?>
