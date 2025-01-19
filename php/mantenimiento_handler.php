<?php
// Incluye el archivo de la clase Mantenimiento y el archivo de conexión a la base de datos
require_once('../config/conexion.php');
require_once(__DIR__ . '/../classes/mantenimiento.php');
require_once(__DIR__ . '/../classes/mantenimiento_repuesto.php');


/* Verifica la conexión a la base de datos
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}*/

// Crea una instancia de la clase Mantenimiento
$mantenimiento = new Mantenimiento();

// Asigna los datos recibidos del formulario a los atributos del objeto Mantenimiento
$mantenimiento->id_vehiculo = $_POST['id_vehiculo'];
$mantenimiento->id_mecanico = $_POST['id_mecanico'];
$mantenimiento->id_tipomanto = $_POST['id_tipomanto'];
$mantenimiento->fecha_mantenimiento = $_POST['fecha_mantenimiento'];
$mantenimiento->descripcion = $_POST['descripcion'];
$mantenimiento->kilometraje = $_POST['kilometraje'];

$repuestos_lista = explode(',',$_POST['repuestos_lista']);

// Asigna la lista de repuestos como una cadena de IDs separados por comas
$mantenimiento->repuestos_lista = $_POST['repuestos_lista'];

// Llama a la función para registrar el mantenimiento en la base de datos
$result = $mantenimiento->registrarMantenimiento($conn);

// Verifica el resultado y muestra un mensaje
if ($result) {
    echo "<script>
    alert('Mantenimiento registrado con éxito.');
    window.location.href = '../menu.php';
  </script>";
        // Verificar si hay página anterior
       // $previousPage = $_SERVER['HTTP_REFERER'] ?? 'menu.php';
       // header("Location: $previousPage");
       // die();
} else {
    echo "Error al registrar el mantenimiento.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>




