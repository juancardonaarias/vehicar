<?php
/*   */
// db.php
$servername = "localhost";
$username = "u376152283_juancardona";
$password = "Jjmscg123692";
$dbname = "u376152283_mecanicapp";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);

}
?>
