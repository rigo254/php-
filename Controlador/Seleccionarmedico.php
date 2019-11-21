<?php
function seleccionar(){
    if(isset($_GET['idMedico'])){
$consultas = new Consultas();
$PkId = $_GET['idMedico'];
$filas = $consultas->cargarmedicos($PkId);
foreach($filas as $fila){
    echo '
  <div class="container text-center">
   <label for="exampleFormControlSelect2" class="col align-self-center">Ingreso de Medicos</label>
    <form method="post" action="ModificarMedico2.php">
  <div class="form-group">   
    <input name="identificacion" class="form-control"  placeholder="Identificacion" value="'.$fila['medIdentificacion'].'">   
  </div>
  <div class="form-group">   
    <input name="nombre" class="form-control"  placeholder="Nombres" value="'.$fila['medNombres'].'">
  </div>
  
  <div class="form-group">   
    <input name="apellidos" class="form-control" placeholder="Apellidos" value="'.$fila['medApellidos'].'">
  </div>
  
   <div class="form-group">   
    <input name="especialidad" class="form-control"  placeholder="Especialidad" value="'.$fila['medEspecialidad'].'">
  </div>
   <div class="form-group">   
    <input name="telefono" class="form-control"  placeholder="Telefoono" value="'.$fila['medTelefono'].'">
  </div>
  
   <div class="form-group">   
    <input name="correo" class="form-control"  placeholder="Correo" value="'.$fila['medCorreo'].'">
  </div>
  <div class="form-group"> 
  <td>&nbsp;</td>
  
    <input type="hidden" name="idMedico"  class="form-control"   value="'.$PkId.'">
  </div>
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-primary" href="../verMedicos.php">Volver</a>
  </div>
  
</form>
';
    
}
        


    }
}

?>