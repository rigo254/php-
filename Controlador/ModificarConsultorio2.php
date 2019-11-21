<?php
require_once('../Modelo/ConexionCitas.php');
require_once('../Modelo/ConsultasConsutorio.php');

$msj = null;
$consultas = new Consultas();
$nombre = $_POST['nombre'];
$pkid = $_POST['idConsultorio'];

if(strlen($nombre) > 0 ){
    $msj = $consultas ->modificarConsultorios("conNombre",$nombre,$pkid);//se crea un objeto de la clase consulta
    
 header("location: ../verConsultorios.php");
  
}else{
    echo "por favor completa todos los campos";
  
}

echo $msj;

?>