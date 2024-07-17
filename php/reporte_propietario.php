<?php
require_once '../config/conexion.php';

/*$id_propietario = $_GET['id_propietario'];

$sql = "SELECT * FROM propietario WHERE id_propietario = ?";*/
$sql = "SELECT * FROM propietario";
$stmt = $conn->prepare($sql);
/*$stmt->bind_param("i", $id_propietario);*/
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Reporte de Mantenimiento por Propietario</h2>";
echo "<table class='table table-responsive table-striped'>";
echo "<thead><tr><th>Nombre Propietario</th><th>Telefono Propietario</th><th>Email</th></tr></thead>";
echo "<tbody>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['nombre_propietario'] . "</td><td>" . $row['telefono_propietario'] . "</td><td>" . $row['email_propietario'] . "</td></tr>";
}
echo "</tbody></table>";
?>
