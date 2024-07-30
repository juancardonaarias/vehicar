<?php
     
     error_reporting(E_ALL);

     class Taller {

            
            public $nombreTaller = null;
            public $direccionTaller = null;
            public $id_ciudad = null;
            public $id_departamento = null;
           

            public function registrarTaller($conn) {
                $sql = "INSERT INTO taller (nombre_taller,direccion_taller,id_ciudad,id_departamento) VALUES (?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssii",$this->nombreTaller, $this->direccionTaller,$this->id_ciudad,$this->id_departamento);
                return $stmt->execute(); 
        

            }

            public function consultarTaller($conn) {
            
                $stmt = $conexion->prepare("SELECT * FROM taller");
                $stmt->execute();
                return $stmt->get_result()->fetch_assoc();

            }

     }

?>