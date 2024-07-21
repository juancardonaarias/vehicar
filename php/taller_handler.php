<?php
require_once('../config/conexion.php');
require_once('../classes/taller.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_taller = $_POST['nombre_taller'];
    $direccion_taller = $_POST['direccion_taller'];
    $ciudad = $_POST['id_ciudad'];
    $departamento = $_POST['id_departamento'];
    
    

    $taller = new Taller();
    $nombreTaller->nombreTaller = $nombre_taller;
    $direccion-> direccion = $direccion_taller;
    

    if ($vehiculo->ingresarTaller($conn)) {
        echo json_encode(['success' => true, 'message' => 'Taller registrado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el Taller.']);
    }
}
?>