<?php
require_once('../config/conexion.php');
require_once('../classes/vehiculo.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca_vehiculo'];
    $modelo = $_POST['modelo_vehiculo'];
    $placa = $_POST['placa_vehiculo'];
    $idPropietario = $_POST['id_propietario'];
    
    

    $vehiculo = new Vehiculo();
    $vehiculo->marcaVehiculo = $marca;
    $vehiculo->modeloVehiculo = $modelo;
    $vehiculo->placaVehiculo = $placa;
    $vehiculo->idPropietario = $idPropietario; 

    if ($vehiculo->ingresarVehiculo($conn)) {
        echo json_encode(['success' => true, 'message' => 'Vehículo registrado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el vehículo.']);
    }
}
?>
