<?php
require_once('../config/conexion.php');
require_once('../classes/Propietario.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_propietario'];
    $telefono = $_POST['telefono_propietario'];
    $email = $_POST['email_propietario'];

    $propietario = new Propietario();
    $propietario->nombre = $nombre;
    $propietario->telefono = $telefono;
    $propietario->emailPropietario = $email;

    if ($propietario->agregarPropietario($conexion)) {
        echo json_encode(['success' => true, 'message' => 'Propietario registrado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el propietario.']);
    }
}
?>
