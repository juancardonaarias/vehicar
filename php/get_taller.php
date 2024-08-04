<?php
require_once '../config/conexion.php';

$sql = "SELECT id_taller, nombre_taller FROM taller";
$result = $conn->query($sql);

$taller = [];
while ($row = $result->fetch_assoc()) {
    $taller[] = $row;
}

echo json_encode($taller);
?>