<?php
require_once('../Modelo/ConexionCitas.php');
require_once('../Modelo/ConsultasMedicos.php');


$mensaje = null;
//capturamos las variables
$identificacion = $_POST["identificacion"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$especialidad = $_POST["especialidad"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];

if(strlen($identificacion) > 0 && strlen($nombre) > 0 && strlen($apellidos) > 0 && strlen($especialidad) > 0 && strlen($telefono) > 0 && strlen($correo) > 0){
    $consultas = new Consultas();//se crea un objeto de la clase consulta
    $mensaje = $consultas ->insertarMedicos($identificacion, $nombre, $apellidos, $especialidad, $telefono, $correo);//pasamos el resultado de la consulta

}

echo $mensaje;

?>