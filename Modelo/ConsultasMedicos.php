<?php


class Consultas{

    public function insertarMedicos($arg_identificacion, $arg_Nombre, $arg_apellidos, $arg_especialidad, $arg_teelfono, $arg_correo){
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "insert into  medicos(medIdentificacion,medNombres,medApellidos,medEspecialidad,medTelefono, medCorreo) values(:identificiacion, :nombre, :apellidos, :especialidad, :telefono, :correo)";//se hace la consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        //se pasan con binparam para evitar el sqlinyeccion
        $statement ->bindParam(':identificiacion',$arg_identificacion);
        $statement ->bindParam(':nombre',$arg_Nombre);
        $statement ->bindParam(':apellidos',$arg_apellidos);
        $statement ->bindParam(':especialidad',$arg_especialidad);
        $statement ->bindParam(':telefono',$arg_teelfono);
        $statement ->bindParam(':correo',$arg_correo);
    
        //mira si el statement esta vacio si esta vacio manda un error y si no lo ejecuta
        if(!$statement){
            return "Error al crear el premio";
        }else{
            $statement->execute();
           header("location: ../Medicos.php");
        }
        
    }
    
    public function cargarmedico(){
        $row = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "SELECT * FROM medicos";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
 
    
    public function buscarmedicos($arg_nombre){
        $rows = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $nombre = "%".$arg_nombre."%";//se lo pasamos por el formulario
        $sql = "select * from medicos where medNombres like :nombre";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement -> bindParam(":nombre",$nombre);
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
    
       public function cargarmedicos($arg_pkid){
        $row = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "SELECT * FROM medicos where idMedico = :pkid";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement->bindParam(":pkid",$arg_pkid);
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
 
    
    public function modificarMedicos($arg_campo, $arg_nombre, $arg_identificacion){
          //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
         $sql = "update medicos set $arg_campo = :nombre where idMedico = :idconsul";
         $statement = $conexion->prepare($sql);
         $statement->bindParam(":nombre", $arg_nombre);
         $statement->bindParam(":idconsul",$arg_identificacion);
         if(!$statement){
             return "error al modificar";
         }else{
             $statement->execute();
             return "Modificado exitosamente";
         }
     }
}
  


?>