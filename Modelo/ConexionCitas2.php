
<?php

/*	class Conexion{
		
		public function get_conexion(){

			$usuario="root";
			$password="";
			$servidor="localhost";
			$base_datos="centromedico";

			$Conexion= new PDO("mysql:host=$servidor;dbname=$base_datos;",$usuario,$password);
			return $Conexion;
		}
		
	}*/


	$bd = new PDO('mysql:host=localhost;dbname=centromedico','root','');
	$bd-> exec("SET NAME UTF8");
 

?>
