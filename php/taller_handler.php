<?php
require_once('../config/conexion.php');
require_once('../classes/taller.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreTaller = $_POST['nombre_taller'];
    $direccionTaller = $_POST['direccion_taller'];
    $id_departamento = $_POST['id_departamento'];
    $id_ciudad = $_POST['id_ciudad'];
  
    

    $taller = new Taller();
    $taller->nombreTaller = $nombreTaller;
    $taller->direccionTaller = $direccionTaller;
    $taller->id_departamento = $id_departamento;
    $taller->id_ciudad = $id_ciudad;
    

    if ($taller->registrarTaller($conn)) {
        echo json_encode(['success' => true, 'message' => 'Taller registrado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el Taller.']);
    }
}
?>


/***************************************** */


