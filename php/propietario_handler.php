<?php
require_once('../config/conexion.php');
require_once('../classes/propietario.php');

session_start(); // Iniciar sesión para almacenar mensajes temporales

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_propietario'];
    $telefono = $_POST['telefono_propietario'];
    $email = $_POST['email_propietario'];
  //  $contrasena = password_hash($_POST['contrasena_propietario'], PASSWORD_DEFAULT);

    $propietario = new Propietario();
    $propietario->nombre = $nombre;
    $propietario->telefono = $telefono;
    $propietario->email = $email;
//  $propietario->contrasena = $contrasena;

    if ($propietario->agregarPropietario($conn)) {
        // Almacenar mensaje en sesión
        $_SESSION['mensaje'] = "Cliente guardado con éxito.";
        $_SESSION['tipo_mensaje'] = "success"; // Tipo de mensaje (success, error, etc.)

        // Redirigir a la página anterior o al menú
        $previousPage = $_SERVER['HTTP_REFERER'] ?? 'menu.php';
        header("Location: $previousPage");
        exit(); // Finaliza la ejecución del script
    } else {
        // Almacenar mensaje de error en sesión
        $_SESSION['mensaje'] = "Error al registrar el propietario.";
        $_SESSION['tipo_mensaje'] = "error";

        // Redirigir a la página anterior
        $previousPage = $_SERVER['HTTP_REFERER'] ?? 'menu.php';
        header("Location: $previousPage");
        exit();
    }
}
?>

