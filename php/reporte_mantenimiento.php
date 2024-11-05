<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Mantenimiento Taller</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Aquí se incluiría el código PHP -->
    <?php
require_once '../config/conexion.php';

// Obtener nombre del propietario del vehículo desde el parámetro GET
$nombre_propietario = $_GET['nombre_propietario'];

// Consulta SQL para seleccionar el vehículo según la placa

$sql = "SELECT p.id_propietario, p.nombre_propietario, p.telefono_propietario, 
p.email_propietario, v.placa_vehiculo
FROM `propietario` p 
JOIN `vehiculo` v 
ON p.id_propietario = v.id_propietario WHERE p.nombre_propietario = ?";

/*$sql = "SELECT * FROM propietario WHERE id_propietario = ?";*/

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Asignar el valor del parámetro a la consulta
    $stmt->bind_param("s", $nombre_propietario); // "s" es para string

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Iniciar la tabla con clases de Bootstrap y estilos personalizados
        echo '
        <div class="container mt-4 d-flex justify-content-center">
            <div class="table-responsive">
                <h2 class="text-center mb-4">Información del Propietario</h2>
                <table class="table table-bordered text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>ID Propietario</th>
                            <th>Nombre Propietario</th>
                            <th>Telefono Propietario</th>
                            <th>Email Propietario</th>
                            <th>Placa Vehiculo<th>
                        </tr>
                    </thead>
                    <tbody>';
        
        // Recorrer los resultados y llenar la tabla
        while ($row = $result->fetch_assoc()) {
            echo '
            <tr>
                <td>' . $row['id_propietario'] . '</td>
                <td>' . $row['nombre_propietario'] . '</td>
                <td>' . $row['telefono_propietario'] . '</td>
                <td>' . $row['email_propietario'] . '</td>
                <td>
                  <a href="consulta_vehiculo.php?placa_vehiculo=' . urlencode($row['placa_vehiculo']) . '">
                ' . $row['placa_vehiculo'] . '
                  </a>
                </td>
            </tr>';
        }

        // Cerrar la tabla
        echo '
                    </tbody>
                </table>
            </div>
        </div>';
    } else {
        echo '<div class="alert alert-warning text-center">No se encontró ningún propietario con ese id.</div>';
    }
    
    // Cerrar la declaración
    $stmt->close();
} else {
    echo '<div class="alert alert-danger text-center">Error al preparar la consulta: ' . $conn->error . '</div>';
}

// Cerrar la conexión
$conn->close();
?>
</body>
</html>