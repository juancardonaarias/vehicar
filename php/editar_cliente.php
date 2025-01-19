<?php 
include '../config/conexion.php'; 

$id_propietario = isset($_GET['id_propietario']) ? intval($_GET['id_propietario']) : null;

if (!$id_propietario) {
    header('Location: reporte_propietario.php?mensaje=error_sin_id');
    exit;
}

$query = "SELECT p.id_propietario, u.id_usuario, u.nombre_usuario, u.email, u.telefono
          FROM propietario p
          JOIN usuarios u ON p.id_usuario = u.id_usuario
          WHERE p.id_propietario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_propietario);

if (!$stmt->execute()) {
    die("Error en la consulta SQL: " . $stmt->error);
}

$result = $stmt->get_result();
$cliente = $result->fetch_assoc();

if (!$cliente) {
    die("Cliente no encontrado con ID: " . $id_propietario);
}

// Valores predeterminados para los campos
$value_nombre = isset($cliente['nombre_usuario']) ? $cliente['nombre_usuario'] : '';
$value_telefono = isset($cliente['telefono']) ? $cliente['telefono'] : '';
$value_email = isset($cliente['email']) ? $cliente['email'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Editar Cliente</h2>
        <form action="actualizar_cliente.php" method="POST">
            <input type="hidden" name="id_propietario" value="<?php echo $id_propietario; ?>">
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" 
                       value="<?php echo htmlspecialchars($value_nombre); ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" 
                       value="<?php echo htmlspecialchars($value_telefono); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="<?php echo htmlspecialchars($value_email); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="lista_clientes.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>



