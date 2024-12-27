<?php
require_once('../config/conexion.php');
require_once('../classes/mecanico.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_mecanico = $_POST['nombre_mecanico'];
    $telefono_mecanico = $_POST['telefono_mecanico'];
    $id_taller=$_POST['id_taller'];
    $email = $_POST['email_mecanico'];
    $contrasena = password_hash($_POST['contrasena_mecanico'], PASSWORD_DEFAULT);

        $mecanico = new Mecanico();
        $mecanico->nombre_mecanico = $nombre_mecanico;
        $mecanico->telefono_mecanico = $telefono_mecanico;
        $mecanico->email = $email;
        $mecanico->contrasena = $contrasena;
        $mecanico->id_taller = $id_taller;
        

    if ($mecanico->registrarMecanico($conn)) {
        // Verificar si hay página anterior
        $previousPage = $_SERVER['HTTP_REFERER'] ?? 'menu.php';
        header("Location: $previousPage");
        die();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el propietario.']);
    }
}
?>
