    <link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
<?php 
session_start();
include("modelo/ConexionCitas2.php");

$usuario = $_POST['usuario'];
$clave = $_POST['contraseña'];

$usuariobd = $bd ->query("SELECT * FROM usuarios WHERE usuLogin = '$usuario' AND usuPassword	 = '$clave'")->fetchALL(PDO::FETCH_OBJ); 
$cont=0;
$nombre;
foreach ($usuariobd as $usuariob) {
	$cont++;
    $nombre = $usuariob->usuLogin;
}

if ($cont== 1)
{
	$_SESSION['Nombre'] = $nombre;
	$_SESSION['mensaje'] = "Bienvenido $usuLogin" . " " . $usuariobd->nombre;
	header("location:http://localhost:8080/mejoramiento/Index.php");
} 
else{
	header("location:http://localhost:8080/mejoramiento/usuarios.php");
	$_SESSION['mensaje'] = "<div class='alert alert-primary' role='alert'>
     El Usuario o La Contraseña son incorrectas!
    </div>";}

 ?>


    <script src="../../boostrap/js/jquery.min.js" ></script>
    <script src="../../boostrap/js/popper.min.js"></script>
    <script src="../../boostrap/js/bootstrap.min.js" ></script>