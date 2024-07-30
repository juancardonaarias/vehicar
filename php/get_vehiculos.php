<?php
require_once '../config/conexion.php';

$sql = "SELECT id_vehiculo, placa_vehiculo FROM vehiculo";
$result = $conn->query($sql);

$vehiculos = [];
while ($row = $result->fetch_assoc()) {
    $vehiculos[] = $row;
}

echo json_encode($vehiculos);
?>
