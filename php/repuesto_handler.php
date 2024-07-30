<?php
require_once('../config/conexion.php');
require_once('../classes/repuesto.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_Repuesto = $_POST['nombre_repuesto'];
    $descripcion = $_POST['descripcion'];
    $id_tipo = $_POST['id_tipo'];
   
  
    

    $repuesto = new Repuesto();
    $repuesto->nombre_Repuesto = $nombre_Repuesto;
    $repuesto->descripcion = $descripcion;
    $repuesto->id_tipo = $id_tipo;
    
    

    if ($taller->registrarTaller($conn)) {
        echo json_encode(['success' => true, 'message' => 'Taller registrado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el Taller.']);
    }
}
?>


/***************************************** */