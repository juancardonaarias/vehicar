<?php

error_reporting(E_ALL);

class Vehiculo
{
    public $idVehiculo = null;
    public $placaVehiculo = null;
    public $marcaVehiculo = null;
    public $modeloVehiculo = null;
    public $kilometraje = null;

    public function ingresarVehiculo($conexion)
    {
        $stmt = $conexion->prepare("INSERT INTO vehiculo (placa, marca, modelo, kilometraje) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $this->placaVehiculo, $this->marcaVehiculo, $this->modeloVehiculo, $this->kilometraje);
        return $stmt->execute();
    }

    public function consultarVehiculo($conexion, $idVehiculo)
    {
        $stmt = $conexion->prepare("SELECT * FROM vehiculo WHERE id_vehiculo = ?");
        $stmt->bind_param("i", $idVehiculo);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
