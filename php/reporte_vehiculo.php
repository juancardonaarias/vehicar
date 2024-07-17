<?php
require_once '../config/conexion.php';

/*$id_vehiculo = $_GET['id_vehiculo'];

$sql = "SELECT * FROM vehiculo WHERE id_vehiculo = ?";*/
$sql = "SELECT vehiculo.id_vehiculo, vehiculo.marca_vehiculo,vehiculo.modelo_vehiculo,
        vehiculo.placa_vehiculo, propietario.nombre_propietario
        FROM vehiculo JOIN propietario 
        ON vehiculo.id_propietario = propietario.id_propietario";
$stmt = $conn->prepare($sql);
/*$stmt->bind_param("i", $id_vehiculo);*/
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Reporte de Mantenimiento por Vehiculo</h2>";
echo "<table class='table'>";
echo "<thead><tr><th>id_Vehiculo</th><th>Marca_Vehiculo</th><th>Modelo_Vehiculo</th><th>Placa_Vehiculo</th><th>Nombre del Propietario</th></tr></thead>";
echo "<tbody>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['id_vehiculo'] . "</td><td>" . $row['marca_vehiculo'] . "</td><td>" . $row['modelo_vehiculo'] . "</td><td>".$row['placa_vehiculo']."</td><td>".$row['nombre_propietario']."</td></tr>";
}
echo "</tbody></table>";
?>
