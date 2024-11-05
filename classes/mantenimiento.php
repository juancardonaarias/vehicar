<?php
class Mantenimiento {
    public $id_vehiculo;
    public $id_mecanico;
    public $id_tipomanto;
    public $fecha_mantenimiento;
    public $descripcion;
    public $kilometraje;
    public $repuestos_lista; // Cadena de IDs de repuestos separados por comas

    public function registrarMantenimiento($conn) {
        // Inserta el mantenimiento en la tabla 'mantenimiento'
        $stmt = $conn->prepare("INSERT INTO mantenimiento (id_vehiculo, id_mecanico, id_tipomanto, fecha_mantenimiento, descripcion, kilometraje) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiissi", $this->id_vehiculo, $this->id_mecanico, $this->id_tipomanto, $this->fecha_mantenimiento, $this->descripcion, $this->kilometraje);

        if ($stmt->execute()) {
            // Obtiene el ID del mantenimiento recién insertado
            $mantenimiento_id = $stmt->insert_id;

            // Verifica si hay repuestos en la lista y los inserta en la tabla intermedia
            if (!empty($this->repuestos_lista)) {
                // Convierte la lista de repuestos en un array
                $repuestos = explode(',', $this->repuestos_lista);

                // Inserta cada repuesto en la tabla 'mantenimiento_repuesto'
                foreach ($repuestos as $repuesto_id) {
                    $stmt_repuesto = $conn->prepare("INSERT INTO mantenimiento_repuesto (id_mantenimiento, id_repuesto) VALUES (?, ?)");
                    $stmt_repuesto->bind_param("ii", $mantenimiento_id, $repuesto_id);
                    $stmt_repuesto->execute();
                    $stmt_repuesto->close();
                }
            }

            $stmt->close();
            return $mantenimiento_id; // Retorna el ID del mantenimiento registrado
        }

        // Si falla la inserción, retorna null
        $stmt->close();
        return null;
    }
}
?>
