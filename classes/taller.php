<?php
     
     error_reporting(E_ALL);

     class Taller {

            //public $idTaller = null;
            public $nombreTaller = null;
            public $direccionTaller = null;
           /* public $departamento = null;
            public $ciudad = null; */


            public registrarTaller($conexion) {

                $stmt = $conexion->prepare("INSERT INTO taller (nombre_taller,direccion_taller) VALUES (?, ?)");
                $stmt->bind_param("ss", $this->nombreTaller, $this->direccionTaller);
                return $stmt->execute(); 
        

            }

            public consultarTaller($conexion) {
            
                $stmt = $conexion->prepare("SELECT * FROM taller");
                $stmt->execute();
                return $stmt->get_result()->fetch_assoc();

            }

     }

?>