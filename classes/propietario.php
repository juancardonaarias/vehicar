<?php

require_once('usuario.php');

//require_once('..proyecto_mecanicapp/classes/Usuario.php');

class Propietario extends Usuario
{
    public $idPropietario = null;
    public $id_usuario = null;
    public $nombre;
    public $telefono;
    public $email; // Declaración de propiedad
    public $contrasena; // Declaración de propiedad


    

    public function agregarPropietario($conn) {

          // Verificar si el correo ya existe en la tabla usuarios
$query_check = "SELECT COUNT(*) as count FROM usuarios WHERE email = ?";
$stmt_check = $conn->prepare($query_check);

// Asignar el valor del email que se desea verificar
$stmt_check->bind_param('s', $this->email);
$stmt_check->execute();

// Obtener el resultado de la consulta
$result_check = $stmt_check->get_result();
$row = $result_check->fetch_assoc();

// Validar si el correo ya existe
if ($row['count'] > 0) {
    throw new Exception("El correo electrónico ya está registrado en la tabla usuarios.");
}

    

        // Inserta primero en usuarios
        $stmtUsuario = $conn->prepare("INSERT INTO usuarios (nombre_usuario, telefono, email, contrasena, tipo_usuario) VALUES (?, ?, ?, ?, ?)");
        $tipoUsuario = 'cliente';
        $stmtUsuario->bind_param("sssss", $this->nombre, $this->telefono, $this->email, $this->contrasena, $tipoUsuario);
    
        if ($stmtUsuario->execute()) {
            $idUsuario = $stmtUsuario->insert_id; // Obtiene el ID generado
    
            // Inserta en propietario con el id_usuario
            $stmtPropietario = $conn->prepare("INSERT INTO propietario (id_usuario) VALUES (?)");
            $stmtPropietario->bind_param("i", $idUsuario);
    
            if ($stmtPropietario->execute()) {
                return true;
            } else {
                error_log("Error al registrar en propietario: " . $stmtPropietario->error);
                return false;
            }
        } else {
            error_log("Error al registrar en usuarios: " . $stmtUsuario->error);
            return false;
        }
    }
    
    

    public function consultarPropietario($conn)
    {
        $sql = "SELECT * FROM propietario WHERE id_propietario = $this->idPropietario";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>
