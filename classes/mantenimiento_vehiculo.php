<?php
    error_reporting(E_ALL);

    class MantenimientoVehiculo {

           public $id_vehiculo = null;
           public $id_mantenimiento = null;
          


           public function registrarMantenimientoVehiculo($conexion) {

               $stmt = $conexion->prepare("INSERT INTO mantenimiento_vehiculo (id_vehiculo,id_mantenimiento) VALUES (?,?)");
               $stmt->bind_param("ii", $this->id_vehiculo,$this->id_mantenimiento);
               return $stmt->execute(); 
           }

    }

?>