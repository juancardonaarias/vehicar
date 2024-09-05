<?php
    error_reporting(E_ALL);

    class Mantenimiento {

           public $idMantenimiento = null;
           public $fecha_mantenimiento = null;
           public $descripcion = null;
           public $id_taller = null;
           public $id_tipomanto = null;
          


           public function registrarMantenimiento($conexion) {

               $stmt = $conexion->prepare("INSERT INTO mantenimiento (fecha_mantenimiento,descripcion,id_taller,id_tipomanto) VALUES (?, ?,?,?)");
               $stmt->bind_param("ssii", $this->fecha_mantenimiento, $this->descripcion,$this->id_taller,$this->id_tipomanto);
               if($stmt->execute()){
                return $conexion->insert_id;
               }
               return null ; 
           }

           public function consultarMantenimiento($conexion) {
           
               $stmt = $conexion->prepare("SELECT * FROM mantenimiento");
               $stmt->execute();
               return $stmt->get_result()->fetch_assoc();

           }

    }

?>