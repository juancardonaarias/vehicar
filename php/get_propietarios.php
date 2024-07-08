<?php
require_once '../config/conexion.php';

$sql = "SELECT id_propietario, nombre_propietario FROM propietario";
$result = $conn->query($sql);

$propietarios = [];
while ($row = $result->fetch_assoc()) {
    $propietarios[] = $row;
}

echo json_encode($propietarios);
?>
