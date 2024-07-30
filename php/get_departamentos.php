<?php
require_once '../config/conexion.php';

$sql = "SELECT id_departamento, nombre_departamento FROM departamento";
$result = $conn->query($sql);

$departamentos = [];
while ($row = $result->fetch_assoc()) {
    $departamentos[] = $row;
}

echo json_encode($departamentos);
?>
