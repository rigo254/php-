<?php

class Consultas{

    public function insertarusuarios($arg_tbl_usuario, $arg_tbl_contrasena){
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "insert into  usuarios(usuLogin, usuPassword) values(:usuario, :contrasena)";//se hace la consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        //se pasan con binparam para evitar el sqlinyeccion
        $statement ->bindParam(':usuario',$arg_tbl_usuario);
        $statement ->bindParam(':contrasena',$arg_tbl_contrasena);
    
        //mira si el statement esta vacio si esta vacio manda un error y si no lo ejecuta
        if(!$statement){
            return "Error al crear el premio";
        }else{
            $statement->execute();
             header("location: ../usuarios.php");
        }
        
    }
    
}


?>