<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Clientes del Taller</title>
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
// $nombre_propietario = isset($_GET['nombre_propietario']) ? $_GET['nombre_propietario'] : null;

$nombre_propietario = isset($_GET['nombre_propietario']) ? '%' . $_GET['nombre_propietario'] . '%' : null;

if (!$nombre_propietario) {
    echo '<div class="alert alert-danger text-center">Error: No se ha proporcionado un nombre de propietario.</div>';
    exit;
}

// Consulta SQL para seleccionar el vehículo según la placa

$sql = "SELECT p.id_propietario, 
               u.nombre_usuario AS nombre_propietario, 
               u.telefono AS telefono_propietario, 
               u.email AS email_propietario, 
               v.placa_vehiculo
        FROM `propietario` p
        JOIN `usuarios` u ON p.id_usuario = u.id_usuario
        LEFT JOIN `vehiculo` v ON p.id_propietario = v.id_propietario
        WHERE TRIM(u.nombre_usuario) LIKE ?";

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
                <td>
                    <a href="editar_cliente.php?id_propietario=' . $row['id_propietario'] . '" class="btn btn-warning">Editar</a>
                </td>
            </tr>';
        }

        // Cerrar la tabla
        echo '
                    </tbody>
                </table>
            </div>
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
