<?php
    error_reporting(E_ALL);

    class Mantenimiento {

           public $idMantenimiento = null;
           public $fecha_mantenimiento = null;
           public $descripcion = null;
          


           public registrarMantenimiento($conexion) {

               $stmt = $conexion->prepare("INSERT INTO mantenimiento (id_mantenimiento,fecha_mantenimiento,descripcion_mantenimiento) VALUES (?, ?, ?)");
               $stmt->bind_param("iss",$this->idMantenimiento, $this->fecha_mantenimiento, $this->descripcion);
               return $stmt->execute(); 
       

           }

           public consultarMantenimiento($conexion) {
           
               $stmt = $conexion->prepare("SELECT * FROM mantenimiento");
               $stmt->execute();
               return $stmt->get_result()->fetch_assoc();

           }

    }

?>