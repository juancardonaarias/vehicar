<?php
include 'config/conexion.php'; // Incluye el archivo de conexión a la base de datos

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $contrasena = $_POST['contrasena']; 



    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado = mysqli_query($conn, $sql);
    $usuario = mysqli_fetch_assoc($resultado);

    echo json_encode( $usuario);


    if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['usuario'] = $usuario['nombre_usuario'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

        // Redirigir a la página del menú según el tipo de usuario
        if ($usuario['tipo_usuario'] == 'mecanico') {
            header("Location: index.html");
        } else {
            header("Location: index.html");
        }
    } else {
        echo "Correo o contraseña incorrectos.";
    }
    mysqli_close($conn);

}
?>
