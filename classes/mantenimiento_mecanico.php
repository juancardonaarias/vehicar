<?php
    error_reporting(E_ALL);

    class MantenimientoMecanico {

           public $id_mecanico = null;
           public $id_mantenimiento = null;
          


           public function registrarMantenimientoMecanico($conexion) {

               $stmt = $conexion->prepare("INSERT INTO mantenimiento_mecanico (id_mecanico,id_mantenimiento) VALUES (?,?)");
               $stmt->bind_param("ii", $this->id_mecanico,$this->id_mantenimiento);
               return $stmt->execute(); 
           }

    }

?>