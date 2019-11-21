<?php
require_once('../Modelo/ConexionCitas.php');
require_once('../Modelo/Consultaspacientes.php');


$mensaje = null;
//capturamos las variables
$identificacion = $_POST["identificacion"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$fecha = $_POST["fecha"];
$sexo = $_POST["sexo"];

if(strlen($identificacion) > 0 && strlen($nombre) > 0 && strlen($apellidos) > 0 && strlen($fecha) > 0 && strlen($sexo) > 0 ){
    $consultas = new Consultas();//se crea un objeto de la clase consulta
    $mensaje = $consultas ->insertarPacientes($identificacion, $nombre, $apellidos, $fecha, $sexo);//pasamos el resultado de la consulta
}

echo $mensaje;

?>