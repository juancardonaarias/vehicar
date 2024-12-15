<?php
include 'config/conexion.php';
include 'classes/Propietario.php';
include 'classes/Mecanico.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    if ($tipo === "mecanico") {
        $mecanico = new Mecanico();
        $mecanico->nombre_mecanico = $nombre;
        $mecanico->telefono_mecanico = $telefono;
        $mecanico->email = $email;
        $mecanico->contrasena = $contrasena;
        if ($mecanico->registrarMecanico($conn)) {
            echo "Mecánico registrado con éxito.";
            header("Location: registro.html");
        } else {
            echo "Error al registrar mecánico.";
           // header("Location: menu.html");
        }
    } elseif ($tipo === "cliente") {
        $propietario = new Propietario();
        $propietario->nombre = $nombre;
        $propietario->telefono = $telefono;
        $propietario->email = $email;
        $propietario->contrasena = $contrasena;
        if ($propietario->agregarPropietario($conn)) {
            echo "Cliente registrado con éxito.";
            header("Location: registro.html");
        } else {
            echo "Error al registrar el cliente.";
           // header("Location: menu.html");
        }
    } else {
        echo "Tipo de usuario inválido.";
    }
    $conn->close();
}
?>
