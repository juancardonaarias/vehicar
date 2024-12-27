<?php
require_once '../config/conexion.php';

// Preparar la consulta SQL
$sql = "
    SELECT 
        propietario.id_propietario, 
        usuarios.id_usuario, 
        usuarios.nombre_usuario AS nombre_propietario
    FROM 
        usuarios 
    JOIN 
        propietario 
    ON 
        usuarios.id_usuario = propietario.id_usuario
    WHERE 
        usuarios.tipo_usuario = 'cliente'
";


$result = $conn->query($sql);

$propietarios = [];
while ($row = $result->fetch_assoc()) {
    $propietarios[] = $row;
}

echo json_encode($propietarios);
?>
