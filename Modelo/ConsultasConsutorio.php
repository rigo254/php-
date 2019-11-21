<?php


class Consultas{

    public function insertarconsultorios( $arg_tbl_Nombre){
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "insert into  consultorios(conNombre) values(:nombre)";//se hace la consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        //se pasan con binparam para evitar el sqlinyeccion
       
        $statement ->bindParam(':nombre',$arg_tbl_Nombre);
    
        //mira si el statement esta vacio si esta vacio manda un error y si no lo ejecuta
        if(!$statement){
            return "Error al crear el premio";
        }else{
            $statement->execute();
           header("location: ../Consultorio.php");
        }
        
    }
    
    public function cargarconsultorios(){
        $row = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "SELECT * FROM consultorios";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
 
    
    public function buscarconsultorio($arg_nombre){
        $rows = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $nombre = "%".$arg_nombre."%";//se lo pasamos por el formulario
        $sql = "select * from consultorios where conNombre like :nombre";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement -> bindParam(":nombre",$nombre);
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
    
       public function cargarconsultorio($arg_pkid){
        $row = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "SELECT * FROM consultorios where idConsultorio = :pkid";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement->bindParam(":pkid",$arg_pkid);
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
 
    
    public function modificarConsultorios($arg_campo, $arg_nombre, $arg_idconsultorio){
          //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
         $sql = "update consultorios set $arg_campo = :nombre where idConsultorio = :idconsul";
         $statement = $conexion->prepare($sql);
         $statement->bindParam(":nombre", $arg_nombre);
         $statement->bindParam(":idconsul",$arg_idconsultorio);
         if(!$statement){
             return "error al modificar";
         }else{
             $statement->execute();
             return "Modificado exitosamente";
         }
     }
}
  


?>