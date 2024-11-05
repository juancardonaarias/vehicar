<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Vehículo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Aquí se incluiría el código PHP -->
    <?php
require_once '../config/conexion.php';

// Obtener la placa del vehículo desde el parámetro GET
$placa_vehiculo = $_GET['placa_vehiculo'];

// Consulta SQL para seleccionar el vehículo según la placa
$sql = "SELECT * FROM vehiculo WHERE placa_vehiculo = ?";

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Asignar el valor del parámetro a la consulta
    $stmt->bind_param("s", $placa_vehiculo); // "s" es para string

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
                <h2 class="text-center mb-4">Información del Vehículo</h2>
                <table class="table table-bordered text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>ID Vehículo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Placa</th>
                        </tr>
                    </thead>
                    <tbody>';
        
        // Recorrer los resultados y llenar la tabla
        while ($row = $result->fetch_assoc()) {
            echo '
            <tr>
                <td>' . $row['id_vehiculo'] . '</td>
                <td>' . $row['marca_vehiculo'] . '</td>
                <td>' . $row['modelo_vehiculo'] . '</td>
                <td>' . $row['placa_vehiculo'] . '</td>
            </tr>';
        }

        // Cerrar la tabla
        echo '
                    </tbody>
                </table>
            </div>
        </div>';
    } else {
        echo '<div class="alert alert-warning text-center">No se encontró ningún vehículo con esa placa.</div>';
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

