<?php
require_once('../config/conexion.php');
require_once('../classes/mecanico.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_mecanico = $_POST['nombre_mecanico'];
    $telefono_mecanico = $_POST['telefono_mecanico'];
    $id_taller=$_POST['id_taller'];
    

    $mecanico = new Mecanico();
    $mecanico->nombre_mecanico = $nombre_mecanico;
    $mecanico->telefono_mecanico = $telefono_mecanico;
    $mecanico->id_taller = $id_taller;
    

    if ($mecanico->registrarMecanico($conn)) {
       // Redirigir antes de cualquier salida
       header("Location: index.html?mensaje=guardado");
       die();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el propietario.']);
    }
}
?>
