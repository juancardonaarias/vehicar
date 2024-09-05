<?php
require_once('../config/conexion.php');
require_once(__DIR__ . '/../classes/mantenimiento.php');
require_once(__DIR__ . '/../classes/mecanico.php');
require_once(__DIR__ . '/../classes/mantenimiento_mecanico.php');
require_once(__DIR__ . '/../classes/mantenimiento_vehiculo.php');
require_once(__DIR__ . '/../classes/mantenimiento_repuesto.php');

/*
 public $idMantenimiento = null;
           public $fecha_mantenimiento = null;
           public $descripcion = null;
*/


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fecha_mantenimiento = $_POST['fecha_mantenimiento'];
    $descripcion = $_POST['descripcion'];
    $idTipoMantenimiento = $_POST['tipo_mantenimiento'];
    $idTaller = Mecanico::consultarIdTallerPorMecanicoId($conn,$_POST['mecanico_form_mant']);

    $mantenimiento = new Mantenimiento();
    $mantenimiento->fecha_mantenimiento = $fecha_mantenimiento;
    $mantenimiento->descripcion = $descripcion;
    $mantenimiento->id_tipomanto = $idTipoMantenimiento;
    $mantenimiento->id_taller = $idTaller;


    $idMantenimiento = $mantenimiento->registrarMantenimiento($conn);
    if ($idMantenimiento) {

            $mantenimientoMecanico = new MantenimientoMecanico();
            $mantenimientoMecanico->id_mecanico = $_POST['mecanico_form_mant'];
            $mantenimientoMecanico->id_mantenimiento = $idMantenimiento;

            $mantenimientoVehiculo = new MantenimientoVehiculo();
            $mantenimientoVehiculo->id_vehiculo = $_POST['vehiculo'];
            $mantenimientoVehiculo->id_mantenimiento = $idMantenimiento;

            $mantenimientoMecanico->registrarMantenimientoMecanico($conn);
            $mantenimientoVehiculo->registrarMantenimientoVehiculo($conn);

            if($_POST['repuestos_lista']){

                foreach (explode(",", $_POST['repuestos_lista']) as $valor) {
                    $mantenimientoRepuesto = new MantenimientoRepuesto();
                    $mantenimientoRepuesto->id_repuesto = $valor;
                    $mantenimientoRepuesto->id_mantenimiento = $idMantenimiento;
                    $mantenimientoRepuesto->registrarMantenimientoRepuesto($conn);
                }
            }
            header("Location: /");
            die();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el propietario.']);
    }
}
?>
