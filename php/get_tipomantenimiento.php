<?php
require_once '../config/conexion.php';

$sql = "SELECT id_tipomanto, nombre_mantenimiento FROM tipo_mantenimiento";
$result = $conn->query($sql);

$tipo_mantenimiento = [];
while ($row = $result->fetch_assoc()) {
    $tipo_mantenimiento[] = $row;
}

echo json_encode($tipo_mantenimiento);
?>