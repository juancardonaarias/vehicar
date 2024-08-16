<?php
require_once '../config/conexion.php';

$sql = "SELECT id_mecanico, nombre_mecanico FROM mecanico";
$result = $conn->query($sql);

$mecanicos = [];
while ($row = $result->fetch_assoc()) {
    $mecanicos[] = $row;
}

echo json_encode($mecanicos);
?>