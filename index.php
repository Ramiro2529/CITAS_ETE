<?php

require_once "Controladores/plantillaControlador.php";
require_once "Controladores/formularioControlador.php";
require_once "Modelos/formularioModelo.php";

require_once "Modelos/conexion.php";
// $conexion=Conexion::conectar();

// echo '<pre>';print_r($conexion);echo '</pre>';

$plantilla = new ControladorPlantilla();
$plantilla->ctrTraerPlantilla();



?>