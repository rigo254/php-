<?php
session_start();
include("../modelo/ConexionCitas2.php");
$Admin = 'Admin';
$usuLogin = 'usuLogin';


$idUsuario = $_SESSION['idUsuario'];

if ($idUsuario == 1) 
{
	$menu = "inicio.php";
}
elseif ($idUsuario == 2) 
{
	$menu = "menucompras.php";
}  
else 
{
	$menu = "menuventas.php";
}

if (isset($_SESSION['mensaje'])) 
{
	$mensaje = $_SESSION['mensaje'];
} 
else 
{
	$mensaje = "";
}
?>	


    <?php 
    include ("Index.html") ?>



