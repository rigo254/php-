<?php
function seleccionar(){
    if(isset($_GET['idCita'])){
$consultas = new Consultas();
$PkId = $_GET['idCita'];
$filas = $consultas->cargarcitas($PkId);
foreach($filas as $fila){
    $db = new PDO("mysql:host=localhost;dbname=centromedico;","root","");
    echo '
    
  <div class="container text-center">
   <label for="exampleFormControlSelect2" class="col align-self-center">Gestion de Citas</label>
    <form method="post" action="ModificarCitas2.php">
 
  <div class="form-group">   
    <input   name="fecha" class="form-control"  placeholder="Fecha De Cita" value="'.$fila['citFecha'].'">
  </div>
  
  <div class="form-group">   
    <input  name="hora" class="form-control"  placeholder="Hora De Cita" value="'.$fila['citHora'].'">
  </div>
  <div class="form-group">';
    foreach($paciente=$db->query('select * from pacientes') as $paciente){
        if($fila['citPaciente']==$paciente['idPaciente']){
            
            echo '<input  name="paciente" class="form-control"  placeholder="paciente" value="'.$paciente['pacNombres'].'">';
            
        }
    }
  echo '</div>
  <div class="form-group">';
  foreach($medico=$db->query('select * from medicos') as $medico){
        if($fila['citMedico']==$medico['idMedico']){
            
            echo '<input  name="medico" class="form-control"  placeholder="medico" value="'.$medico['medNombres'].'">';
            
        }
    }
  echo
  
    
  '</div>
  <div class="form-group">';
  foreach($consul=$db->query('select * from consultorios') as $consul){
        if($fila['citConsultorio']==$consul['idConsultorio']){
            
            echo '<input  name="consultorio" class="form-control"  placeholder="consultorio" value="'.$consul['conNombre'].'">';
            
        }
    }
  echo
  
    
  '</div>
   <div class="form-group">
    
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Observaciones" name="observaciones"></textarea>
  </div>
   <div class="form-group"> 
  <td>&nbsp;</td>
    <input type="hidden" name="estado"  class="form-control"   value="Atendido">
    <input type="hidden" name="idCita"  class="form-control"   value="'.$PkId.'">
  </div>

  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-primary" href="../verCitas.php">Volver</a>
  </div>
</form>
   </div>
';
    
}
        


    }
}

?>