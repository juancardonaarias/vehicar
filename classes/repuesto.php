<?php
   error_reporting(E_ALL);

   class Repuesto {

             public $id_Repuesto=NULL;
             public $nombre_Repuesto=NULL;
             public $descripcion=NULL;


             function agregar_Repuesto($conexion) {
                $stmt = $conexion->prepare("INSERT INTO repuesto (id_repuesto,nombre_repuesto,descripcion_repuesto) VALUES (?, ?, ?)");
                $stmt->bind_param("iss",$this->id_Repuesto, $this->nombre_Repuesto, $this->descripcion);
                return $stmt->execute();

             }

             function consultar_Repuesto($conexion) {
                $stmt = $conexion->prepare("SELECT * FROM repuesto");
                $stmt->execute();
                return $stmt->get_result()->fetch_assoc();

             }





   }








?>