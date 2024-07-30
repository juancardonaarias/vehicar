<?php
require_once '../config/conexion.php';

$sql = "SELECT id_ciudad, nombre_ciudad FROM ciudad";
$result = $conn->query($sql);

$ciudades = [];
while ($row = $result->fetch_assoc()) {
    $ciudades[] = $row;
}

echo json_encode($ciudades);
?>