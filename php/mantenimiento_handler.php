<?php
require_once('../config/conexion.php');
require_once('../classes/mantenimiento.php');

/*
 public $idMantenimiento = null;
           public $fecha_mantenimiento = null;
           public $descripcion = null;
*/


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_mantenimiento = $_POST['fecha_mantenimiento'];
    $descripcion = $_POST['descripcion'];


    $mantenimiento = new Mantenimiento();
    $mantenimiento->fecha_mantenimiento = $fecha_mantenimiento;
    $mantenimiento->descripcion = $descripcion;
    

    if ($mantenimiento->agregarMantenimiento($conn)) {
       // Redirigir antes de cualquier salida
       header("Location: index.html?mensaje=guardado");
       die();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el propietario.']);
    }
}
?>
