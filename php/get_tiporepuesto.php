<?php
require_once '../config/conexion.php';

$sql = "SELECT id_tipo, tipo FROM tipo_repuesto";
$result = $conn->query($sql);

$tipo_repuesto = [];
while ($row = $result->fetch_assoc()) {
    $tipo_repuesto[] = $row;
}

echo json_encode($tipo_repuesto);
?>