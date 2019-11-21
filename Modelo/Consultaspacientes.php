<?php


class Consultas{

    public function insertarPacientes($arg_identificacion, $arg_Nombre, $arg_apellidos, $arg_fecha, $arg_sexo){
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "insert into  pacientes(pacIdentificacion,pacNombres,pacApellidos,pacFechaNacimiento,pacSexo) values(:identificiacion, :nombre, :apellidos, :fecha, :sexo)";//se hace la consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        //se pasan con binparam para evitar el sqlinyeccion
        $statement ->bindParam(':identificiacion',$arg_identificacion);
        $statement ->bindParam(':nombre',$arg_Nombre);
        $statement ->bindParam(':apellidos',$arg_apellidos);
        $statement ->bindParam(':fecha',$arg_fecha);
        $statement ->bindParam(':sexo',$arg_sexo);
    
        //mira si el statement esta vacio si esta vacio manda un error y si no lo ejecuta
        if(!$statement){
            return "Error al crear el premio";
        }else{
            $statement->execute();
            header("location: ../Pacientes.php");
        }
        
    }
    
    public function cargarpaciente(){
        $row = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "SELECT * FROM pacientes";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
 
    
    public function buscarpaciente($arg_nombre){
        $rows = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $nombre = "%".$arg_nombre."%";//se lo pasamos por el formulario
        $sql = "select * from pacientes where pacNombres like :nombre";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement -> bindParam(":nombre",$nombre);
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
    
       public function cargarpacientes($arg_pkid){
        $row = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "SELECT * FROM pacientes where idPaciente = :pkid";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement->bindParam(":pkid",$arg_pkid);
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
 
    
    public function modificarPacientes($arg_campo, $arg_nombre, $arg_identificacion){
          //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
         $sql = "update pacientes set $arg_campo = :nombre where idPaciente = :idconsul";
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