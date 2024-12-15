<?php
    error_reporting(E_ALL);

    require_once(__DIR__ . '/../classes/usuario.php');


    class Mecanico extends Usuario {

           public $idMecanico = null;
           public $id_usuario = null;
           public $nombre_mecanico;  // Agregado
           public $telefono_mecanico; // Agregado
           public $email;  // Agregado
           public $contrasena;  // Agregado


    public function registrarMecanico($conn) {

        // Verificar si el email ya existe
    $stmtVerificar = $conn->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
    $stmtVerificar->bind_param("s", $this->email);
    $stmtVerificar->execute();
    $stmtVerificar->store_result();

    if ($stmtVerificar->num_rows > 0) {
        error_log("El email ya está registrado.");
        return false;  // Puedes lanzar un mensaje de error al usuario
    }
    $stmtVerificar->close();

        // Inserta primero en usuarios
        $stmtUsuario = $conn->prepare("INSERT INTO usuarios (nombre_usuario, telefono, email, contrasena, tipo_usuario) VALUES (?, ?, ?, ?, ?)");
        $tipoUsuario = 'mecanico';
        $stmtUsuario->bind_param("sssss", $this->nombre_mecanico, $this->telefono_mecanico, $this->email, $this->contrasena, $tipoUsuario);
    
        if ($stmtUsuario->execute()) {
            $idUsuario = $stmtUsuario->insert_id; // Obtiene el ID generado
    
            // Inserta en mecanico con el id_usuario y id_taller
            $stmtMecanico = $conn->prepare("INSERT INTO mecanico (id_usuario) VALUES (?)");
            $stmtMecanico->bind_param("i", $idUsuario);
    
            if ($stmtMecanico->execute()) {
                return true;
            } else {
                error_log("Error al registrar en mecanico: " . $stmtMecanico->error);
                return false;
            }
        } else {
            error_log("Error al registrar en usuarios: " . $stmtUsuario->error);
            return false;
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