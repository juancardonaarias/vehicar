<?php
require_once('../config/conexion.php');
require_once('../classes/Vehiculo.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca_vehiculo'];
    $modelo = $_POST['modelo_vehiculo'];
    $placa = $_POST['placa_vehiculo'];

    $vehiculo = new Vehiculo();
    $vehiculo->marcaVehiculo = $marca;
    $vehiculo->modeloVehiculo = $modelo;
    $vehiculo->placaVehiculo = $placa;

    if ($vehiculo->ingresarVehiculo($conexion)) {
        echo json_encode(['success' => true, 'message' => 'Vehículo registrado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el vehículo.']);
    }
}
?>
