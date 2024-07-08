<?php
require_once '../config/conexion.php';

$id_propietario = $_GET['id_propietario'];

$sql = "SELECT * FROM mantenimiento WHERE id_propietario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_propietario);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Reporte de Mantenimiento por Propietario</h2>";
echo "<table class='table'>";
echo "<thead><tr><th>Fecha</th><th>Vehículo</th><th>Descripción</th></tr></thead>";
echo "<tbody>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['fecha_mantenimiento'] . "</td><td>" . $row['id_vehiculo'] . "</td><td>" . $row['descripcion'] . "</td></tr>";
}
echo "</tbody></table>";
?>
