<?php
    error_reporting(E_ALL);

    class MantenimientoRepuesto {

           public $id_repuesto = null;
           public $id_mantenimiento = null;
          


           public function registrarMantenimientoRepuesto($conexion) {

               $stmt = $conexion->prepare("INSERT INTO mantenimiento_repuesto (id_repuesto,id_mantenimiento) VALUES (?,?)");
               $stmt->bind_param("ii", $this->id_repuesto,$this->id_mantenimiento);
               return $stmt->execute(); 
           }

    }

?>