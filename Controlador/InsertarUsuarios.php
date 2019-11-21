<?php
require_once('../Modelo/ConexionCitas.php');
require_once('../Modelo/Consultasusuarios.php');

$mensaje = null;
//capturamos las variables
$usuario= $_POST["usuario"];
$contrasena= $_POST["password"];
$clave2 = $_POST["password2"];

    if($contrasena == $clave2){

     
       

       
        $consultas = new Consultas();//se crea un objeto de la clase consulta
        $mensaje = $consultas ->insertarusuarios($usuario, $contrasena);//pasamos el resultado de la consulta


      
      }else{

   
      echo '<script language="javascript">alert("No coinciden las Contraseñas");</script>';
    

  }

echo $mensaje;

?>