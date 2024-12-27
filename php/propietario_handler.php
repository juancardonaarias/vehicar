<?php
require_once('../config/conexion.php');
require_once('../classes/propietario.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_propietario'];
    $telefono = $_POST['telefono_propietario'];
    $email = $_POST['email_propietario'];
    $contrasena = password_hash($_POST['contrasena_propietario'], PASSWORD_DEFAULT);

    $propietario = new Propietario();
    $propietario->nombre = $nombre;
    $propietario->telefono = $telefono;
    $propietario->email = $email;
    $propietario->contrasena = $contrasena;

    if ($propietario->agregarPropietario($conn)) {
        // Verificar si hay página anterior
        $previousPage = $_SERVER['HTTP_REFERER'] ?? 'menu.php';
        header("Location: $previousPage");
        die();
       
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el propietario.']);
    }
}
?>
