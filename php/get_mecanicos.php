<?php
require_once '../config/conexion.php';

$sql = "
    SELECT 
        mecanico.id_mecanico, 
        usuarios.id_usuario, 
        usuarios.nombre_usuario AS nombre_mecanico
    FROM 
        usuarios 
    JOIN 
        mecanico 
    ON 
        usuarios.id_usuario = mecanico.id_usuario
    WHERE 
        usuarios.tipo_usuario = 'mecanico'
";



$result = $conn->query($sql);

$mecanicos = [];
while ($row = $result->fetch_assoc()) {
    $mecanicos[] = $row;
}

echo json_encode($mecanicos);
?>
