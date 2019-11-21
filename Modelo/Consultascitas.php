<?php


class Consultas{

    public function insertarcitas($arg_fecha, $arg_hora, $arg_paciente, $arg_medico, $arg_consultorio){
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "insert into  citas(citFecha,citHora,citPaciente,citMedico,citConsultorio, citEstado, citObservaciones) values(:fecha, :hora, :paciente, :medico, :consultorio,'Asignado', ' ')";//se hace la consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        //se pasan con binparam para evitar el sqlinyeccion
        $statement ->bindParam(':fecha',$arg_fecha);
        $statement ->bindParam(':hora',$arg_hora);
        $statement ->bindParam(':paciente',$arg_paciente);
        $statement ->bindParam(':medico',$arg_medico);
        $statement ->bindParam(':consultorio',$arg_consultorio);
     
    
        //mira si el statement esta vacio si esta vacio manda un error y si no lo ejecuta
        if(!$statement){
            return "Error al crear el Cita";
        }else{
            $statement->execute();
            header("location: ../Citas.php");
        }
        
    }
    
    public function cargarcita(){
        $row = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "SELECT * FROM citas where citEstado = 'Asignado'";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
 
    
    public function buscarcitas($arg_nombre){
        $rows = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $nombre = "%".$arg_nombre."%";//se lo pasamos por el formulario
        $sql = "select citas.idCita,citas.citFecha,citas.citHora,pacientes.pacNombres,medicos.medNombres,consultorios.conNombre,citas.citEstado,citas.citObservaciones
        from citas
        inner join pacientes on citas.citPaciente=pacientes.idPaciente
        inner join medicos on citas.citMedico=medicos.idMedico
        inner join consultorios on citas.citConsultorio=consultorios.idConsultorio where pacientes.pacNombres like :nombre or pacientes.pacIdentificacion like :nombre or medicos.medNombres like :nombre";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement -> bindParam(":nombre",$nombre);
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
    
       public function cargarcitas($arg_pkid){
        $row = null;
        //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
        $sql = "SELECT * FROM citas where idCita = :pkid";//se hace consulta
        $statement = $conexion->prepare($sql);//preparar la consulta
        $statement->bindParam(":pkid",$arg_pkid);
        $statement->execute();//ejecutamos el statement
        //recorrecoremos cada una de las fiklas que nos devuelva cada una de las filas de las cunsulta
        while($result = $statement->fetch()){
            $rows[] = $result; 
        }
        return $rows;
    }
 
    
    public function modificarCitas($arg_campo, $arg_nombre, $arg_id){
          //se crea un objeto de de la clase conexion
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();//se guarda la conexion en la variable conexion
         $sql = "update citas set $arg_campo = :nombre where idCita = :idconsul";
         $statement = $conexion->prepare($sql);
         $statement->bindParam(":nombre", $arg_nombre);
         $statement->bindParam(":idconsul",$arg_id);
         if(!$statement){
             return "error al modificar";
         }else{
             $statement->execute();
             return "Modificado exitosamente";
         }
     }
}
  


?>