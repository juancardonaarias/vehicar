<?php
    error_reporting(E_ALL);

    class Mecanico {

           public $idMecanico = null;
           public $nombreMecanico = null;
           public $telefonoMecanico = null;
          


           public registrarMecanico($conexion) {

               $stmt = $conexion->prepare("INSERT INTO mecanico (id_mecanico,nombre_mecanico,telefono_mecanico) VALUES (?, ?, ?)");
               $stmt->bind_param("iss",$this->idMecanico, $this->nombreMecanico, $this->telefonoMecanico);
               return $stmt->execute(); 
       

           }

           public consultarMecanico($conexion) {
           
               $stmt = $conexion->prepare("SELECT * FROM mecanico");
               $stmt->execute();
               return $stmt->get_result()->fetch_assoc();

           }

    }

?>