<?php
require_once('../Modelo/ConexionCitas.php');
require_once('../Modelo/ConsultasConsutorio.php');


$mensaje = null;
//capturamos las variables

$nombre = $_POST["nombre"];

if(strlen($nombre) > 0 ){
    $consultas = new Consultas();//se crea un objeto de la clase consulta
    $mensaje = $consultas ->insertarconsultorios( $nombre);//pasamos el resultado de la consulta
}

echo $mensaje;

?>