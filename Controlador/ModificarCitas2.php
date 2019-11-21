<?php
require_once('../Modelo/ConexionCitas.php');
require_once('../Modelo/Consultascitas.php');

$msj = null;
$consultas = new Consultas();
$fecha = $_POST['fecha'];
$pkid = $_POST['idCita'];
$hora = $_POST['hora'];
$paciente = $_POST['paciente'];
$medico = $_POST['medico'];
$consultorio = $_POST['consultorio'];
$estado = $_POST['estado'];
$observaciones = $_POST['observaciones'];


if(strlen($fecha) > 0 && strlen($hora) > 0 && strlen($paciente) > 0 && strlen($medico) > 0 && strlen($consultorio) > 0 && strlen($estado) > 0 && strlen($observaciones) > 0 ){
    $msj = $consultas ->modificarCitas("citFecha",$fecha,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarCitas("citHora",$hora,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarCitas("citPaciente",$paciente,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarCitas("citMedico",$medico,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarCitas("citConsultorio",$consultorio,$pkid);//se crea un objeto de la clase consulta    
    $msj = $consultas ->modificarCitas("citEstado",$estado,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarCitas("citObservaciones",$observaciones,$pkid);//se crea un objeto de la clase consulta
    
  header("location: ../verCitas.php");
  
}else{
    echo "por favor completa todos los campos";
  
}

echo $msj;

?>