<?php

require_once('..proyecto_mecanicapp/classes/Usuario.php');

class Propietario extends Usuario
{
    public $idPropietario = null;
    public $emailPropietario = null;

    public function agregarPropietario($conn)
    {
        $sql = "INSERT INTO propietario (nombre_propietario, telefono_propietario, email_propietario) 
                VALUES ('$this->nombre', '$this->telefono', '$this->emailPropietario')";
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo propietario registrado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
