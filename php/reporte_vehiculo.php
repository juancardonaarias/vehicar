<?php
require_once '../config/conexion.php';

// Verificar que se haya recibido el parámetro 'placa_vehiculo'
if (!isset($_GET['placa_vehiculo']) || empty($_GET['placa_vehiculo'])) {
    die('<div class="alert alert-warning text-center mt-4">Parámetro "placa_vehiculo" no proporcionado.</div>');
}

$placa_vehiculo = $_GET['placa_vehiculo'];

// Consulta SQL para obtener información del vehículo, mantenimiento y repuestos
$sql = "
SELECT 
    v.id_vehiculo,
    v.marca_vehiculo,
    v.modelo_vehiculo,
    v.placa_vehiculo,
    p.id_propietario,
    u.nombre_usuario AS nombre_propietario,
    u.telefono AS telefono_propietario,
    u.email AS email_propietario,
    m.id_mantenimiento,
    m.fecha_mantenimiento,
    m.descripcion AS descripcion_mantenimiento,
    m.kilometraje,
    r.nombre_repuesto,
    r.descripcion_repuesto,
    tr.tipo AS tipo_repuesto,
    um.nombre_usuario AS nombre_mecanico
FROM vehiculo v
JOIN propietario p ON v.id_propietario = p.id_propietario
JOIN usuarios u ON p.id_usuario = u.id_usuario
JOIN mantenimiento m ON v.id_vehiculo = m.id_vehiculo
LEFT JOIN mantenimiento_repuesto mr ON m.id_mantenimiento = mr.id_mantenimiento
LEFT JOIN repuesto r ON mr.id_repuesto = r.id_repuesto
LEFT JOIN tipo_repuesto tr ON r.id_tipo = tr.id_tipo
LEFT JOIN mecanico mec ON m.id_mecanico = mec.id_mecanico
LEFT JOIN usuarios um ON mec.id_usuario = um.id_usuario
WHERE v.placa_vehiculo = ?";

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Asignar el valor del parámetro
    $stmt->bind_param("s", $placa_vehiculo);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();
} else {
    // Manejar el error de preparación de la consulta
    die('<div class="alert alert-danger text-center mt-4">Error al preparar la consulta: ' . htmlspecialchars($conn->error) . '</div>');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte del Vehículo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <!-- Título del Reporte -->
        <h2 class="text-center mb-4">Información del Vehículo y Mantenimiento</h2>

        <!-- Botón para volver al menú principal -->
       

        <?php
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            echo '
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Vehículo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Placa</th>
                            <th>ID Mantenimiento</th>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Kilometraje</th>
                            <th>Mecánico</th>
                            <th>Repuesto</th>
                            <th>Descripción Repuesto</th>
                            <th>Tipo Repuesto</th>
                        </tr>
                    </thead>
                    <tbody>';

            // Iterar sobre los resultados
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['id_vehiculo']) . "</td>
                        <td>" . htmlspecialchars($row['marca_vehiculo']) . "</td>
                        <td>" . htmlspecialchars($row['modelo_vehiculo']) . "</td>
                        <td>" . htmlspecialchars($row['placa_vehiculo']) . "</td>
                        <td>" . htmlspecialchars($row['id_mantenimiento']) . "</td>
                        <td>" . htmlspecialchars($row['fecha_mantenimiento']) . "</td>
                        <td>" . htmlspecialchars($row['descripcion_mantenimiento']) . "</td>
                        <td>" . htmlspecialchars($row['kilometraje']) . "</td>
                        <td>" . htmlspecialchars($row['nombre_mecanico']) . "</td>
                        <td>" . htmlspecialchars($row['nombre_repuesto']) . "</td>
                        <td>" . htmlspecialchars($row['descripcion_repuesto']) . "</td>
                        <td>" . htmlspecialchars($row['tipo_repuesto']) . "</td>
                    </tr>";
            }

            echo '</tbody>
                </table>
            </div>';

            // Opcional: Botón al final de la tabla
            echo '
            <div class="mt-4 text-center">
                <a href="../menu.php" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-4h3v4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1ZM13 7.293l-6-6-6 6V13a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V9a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4h1a1 1 0 0 0 1-1V7.293Z"/>
                    </svg>
                    Volver al Menú Principal
                </a>
            </div>';
        } else {
            echo '<div class="alert alert-warning text-center">No se encontró información para esta placa.</div>';
        }

        // Cerrar la declaración
        $stmt->close();

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
