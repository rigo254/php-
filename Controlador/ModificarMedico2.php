<?php
require_once('../Modelo/ConexionCitas.php');
require_once('../Modelo/ConsultasMedicos.php');

$msj = null;
$consultas = new Consultas();
$nombre = $_POST['nombre'];
$pkid = $_POST['idMedico'];
$apellidos = $_POST['apellidos'];
$identificacion = $_POST['identificacion'];
$especialidad = $_POST['especialidad'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

if(strlen($identificacion) > 0 && strlen($nombre) > 0 && strlen($apellidos) > 0 && strlen($telefono) > 0 && strlen($correo) > 0 && strlen($especialidad) > 0 ){
    $msj = $consultas ->modificarMedicos("medNombres",$nombre,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarMedicos("medIdentificacion",$identificacion,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarMedicos("medApellidos",$apellidos,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarMedicos("medEspecialidad",$especialidad,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarMedicos("medTelefono",$telefono,$pkid);//se crea un objeto de la clase consulta
    $msj = $consultas ->modificarMedicos("medCorreo",$correo,$pkid);//se crea un objeto de la clase consulta
    
    header("location: ../verMedicos.php");
}else{
    echo "por favor completa todos los campos";
  
}

echo $msj;

?>