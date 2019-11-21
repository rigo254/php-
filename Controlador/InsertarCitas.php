<?php
require_once('../Modelo/ConexionCitas.php');
require_once('../Modelo/Consultascitas.php');


$mensaje = null;
//capturamos las variables
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$paciente = $_POST["paciente"];
$medico = $_POST["medico"];
$consultorio = $_POST["consultorio"];


if(strlen($fecha) > 0 && strlen($hora) > 0 && strlen($paciente) > 0 && strlen($medico) > 0 && strlen($consultorio) > 0 ){
    $consultas = new Consultas();//se crea un objeto de la clase consulta
    $mensaje = $consultas ->insertarcitas($fecha, $hora, $paciente, $medico, $consultorio);//pasamos el resultado de la consulta
}

echo $mensaje;

?>