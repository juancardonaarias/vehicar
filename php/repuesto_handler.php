<?php
require_once('../config/conexion.php');
require_once('../classes/repuesto.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_Repuesto = $_POST['nombre_repuesto'];
    $descripcion = $_POST['descripcion_repuesto'];
    $id_tipo = $_POST['id_tiporepuesto'];
   
  
    

    $repuesto = new Repuesto();
    $repuesto->nombre_Repuesto = $nombre_Repuesto;
    $repuesto->descripcion = $descripcion;
    $repuesto->id_tipo = $id_tipo;
    
    

    if ($repuesto->agregar_Repuesto($conn)) {
        echo json_encode(['success' => true, 'message' => 'Repuesto registrado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el Repuesto.']);
    }
}
?>


/***************************************** */