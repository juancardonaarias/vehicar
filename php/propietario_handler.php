<?php
require_once('../config/conexion.php');
require_once('../classes/propietario.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_propietario'];
    $telefono = $_POST['telefono_propietario'];
    $email = $_POST['email_propietario'];

    $propietario = new Propietario();
    $propietario->nombre = $nombre;
    $propietario->telefono = $telefono;
    $propietario->email = $email;

    if ($propietario->agregarPropietario($conn)) {
       // Redirigir antes de cualquier salida
       header("Location: index.html?mensaje=guardado");
       die();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el propietario.']);
    }
}
?>
