<?php
include 'config/conexion.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encripta la contraseña

    // Inserta los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre_usuario, email, telefono, tipo_usuario, contrasena)
            VALUES ('$nombre', '$email', '$telefono', '$tipo', '$contrasena')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Usuario registrado con éxito";
        header("Location: login.html"); // Redirige al inicio de sesión
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
