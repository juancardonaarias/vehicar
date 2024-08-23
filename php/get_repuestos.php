<?php
require_once '../config/conexion.php';

$sql = "SELECT id_repuesto, nombre_repuesto FROM repuesto";
$result = $conn->query($sql);

$repuestos = [];
while ($row = $result->fetch_assoc()) {
    $repuestos[] = $row;
}

echo json_encode($repuestos);
?>