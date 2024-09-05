<?php
    error_reporting(E_ALL);

    require_once(__DIR__ . '/../classes/usuario.php');


    class Mecanico extends Usuario {

           public $idMecanico = null;
           public $nombre_mecanico = null;
           public $telefono_mecanico = null;
           public $id_taller = null;
          


           public function registrarMecanico($conn) {

               $stmt = $conn->prepare("INSERT INTO mecanico (id_mecanico,nombre_mecanico,telefono_mecanico,id_taller) VALUES (?, ?, ?, ?)");
               $stmt->bind_param("issi",$this->idMecanico, $this->nombre_mecanico, $this->telefono_mecanico, $this->id_taller);
               return $stmt->execute(); 
       
               if ($conn->query($sql) === TRUE) {
                echo "Nuevo propietario registrado exitosamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

           }

           public function consultarMecanico($conexion) {
           
               $stmt = $conexion->prepare("SELECT * FROM mecanico");
               $stmt->execute();
               return $stmt->get_result()->fetch_assoc();
           }

           public static function consultarIdTallerPorMecanicoId($conexion,$idMecanico){
                $sql = "SELECT id_taller FROM mecanico WHERE id_mecanico = $idMecanico";
                $result = $conexion->query($sql);
        
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return $row['id_taller']; 

                } else {
                    return null;
                }
           }

    }

?>