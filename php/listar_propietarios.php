<?php
// Incluir archivos necesarios
include '../config/conexion.php';

// Manejar mensajes y parámetros
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
$id_propietario = isset($_GET['id_propietario']) ? intval($_GET['id_propietario']) : null;

// Mostrar mensaje basado en los parámetros
if ($mensaje === 'actualizado' && $id_propietario) {
    echo "<div class='alert alert-success'>El propietario con ID {$id_propietario} se actualizó correctamente.</div>";
} elseif ($mensaje !== '') {
    echo "<div class='alert alert-danger'>Error: No se ha proporcionado un nombre de propietario.</div>";
}

// Continúa con la lógica de reporte (consulta y visualización de datos)
$query = "SELECT p.id_propietario, u.nombre_usuario, u.telefono, u.email 
          FROM propietario p
          JOIN usuarios u ON p.id_usuario = u.id_usuario";
$result = $conn->query($query);

if (!$result) {
    die("Error al realizar la consulta: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Propietarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Reporte de Propietarios</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_propietario']; ?></td>
                    <td><?php echo htmlspecialchars($row['nombre_usuario']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
     
    <div class="mt-4 text-center">
                <a href="../menu.php" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-4h3v4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1ZM13 7.293l-6-6-6 6V13a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V9a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4h1a1 1 0 0 0 1-1V7.293Z"/>
                    </svg>
                    Volver al Menú Principal
                </a>
    </div>;

</body>
</html>