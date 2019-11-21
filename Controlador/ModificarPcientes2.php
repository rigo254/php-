<?php
require_once('../Modelo/ConexionCitas.php');
require_once('../Modelo/Consultaspacientes.php');

$msj = null;
$consultas = new Consultas();
$nombre = $_POST['nombre'];
$pkid = $_POST['idPaciente'];
$apellidos = $_POST['apellidos'];
$identificacion = $_POST['identificacion'];
$fecha = $_POST['fecha'];
$sexo = $_POST['sexo'];

if(strlen($identificacion) > 0 && strlen($nombre) > 0 && strlen($apellidos) > 0 && strlen($fecha) > 0 && strlen($sexo) > 0  ){
    $msj = $consultas ->modificarPacientes("pacNombres",$nombre,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarPacientes("pacIdentificacion",$identificacion,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarPacientes("pacApellidos",$apellidos,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarPacientes("pacFechaNacimiento",$fecha,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarPacientes("pacSexo",$sexo,$pkid);//se crea un objeto de la clase consulta
    
header("location: ../VerPacientes.php");
  
}else{
    echo "por favor completa todos los campos";
  
}

echo $msj;

?>