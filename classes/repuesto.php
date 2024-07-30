<?php
   error_reporting(E_ALL);

   class Repuesto {

             
             public $nombre_Repuesto=NULL;
             public $descripcion=NULL;
             public $id_tipo=NULL;


             function agregar_Repuesto($conn) {
                $stmt = $conn->prepare("INSERT INTO repuesto (nombre_repuesto,descripcion_repuesto,id_tipo) VALUES (?, ?, ?)");
                $stmt->bind_param("ssi",$this->nombre_Repuesto, $this->descripcion, $this->id_tipo);
                return $stmt->execute();

             }

             function consultar_Repuesto($conn) {
                $stmt = $conn->prepare("SELECT * FROM repuesto");
                $stmt->execute();
                return $stmt->get_result()->fetch_assoc();

             }





   }








?>