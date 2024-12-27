<?php
include 'config/conexion.php';
include 'classes/propietario.php';
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
            echo "<script>
                    alert('Mecánico registrado con éxito.');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al registrar mecánico. Inténtalo nuevamente.');
                    window.location.href = 'registro.html';
                  </script>";
        }
    } elseif ($tipo === "cliente") {
        $propietario = new Propietario();
        $propietario->nombre = $nombre;
        $propietario->telefono = $telefono;
        $propietario->email = $email;
        $propietario->contrasena = $contrasena;
        if ($propietario->agregarPropietario($conn)) {
            echo "<script>
                    alert('Cliente registrado con éxito.');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al registrar el cliente. Inténtalo nuevamente.');
                    window.location.href = 'registro.html';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Tipo de usuario inválido.');
                window.location.href = 'registro.html';
              </script>";
    }
    $conn->close();
}
?>
