<?php
function seleccionar(){
    if(isset($_GET['idPaciente'])){
$consultas = new Consultas();
$PkId = $_GET['idPaciente'];
$filas = $consultas->cargarpacientes($PkId);

foreach($filas as $fila){
    echo '
        <div class="container text-center">
   <label for="exampleFormControlSelect2" class="col align-self-center">Ingreso de Pacientes</label>
    <form method="post" action="ModificarPcientes2.php">
  <div class="form-group">   
    <input name="identificacion" class="form-control"  placeholder="Identificacion" value="'.$fila['pacIdentificacion'].'">   
  </div>
  <div class="form-group">   
    <input  name="nombre" class="form-control"  placeholder="Nombres" value="'.$fila['pacNombres'].'">
  </div>
  
  <div class="form-group">   
    <input name="apellidos" class="form-control"  placeholder="Apellidos" value="'.$fila['pacApellidos'].'">
  </div>
  
   <div class="form-group">   
    <input name="fecha" type="date"  class="form-control" placeholder="Fecha De Naciemiento" value="'.$fila['pacFechaNacimiento'].'">
  </div>
  <div class="text-left"> 
  <label for="exampleInputPassword1">Sexo</label>
  <select name="sexo" class="form-control form-control-lg" value="'.$fila['pacSexo'].'">
  <option value="Masculino">Masculino</option>
  <option value="Femenino">Femenino</option>
</select>
 </div>
 <div class="form-group"> 
  <td>&nbsp;</td>
  
    <input type="hidden" name="idPaciente"  class="form-control"   value="'.$PkId.'">
  </div>
  <div>
  <button type="submit" class="btn btn-primary" >Submit</button>
  <a class="btn btn-primary" href="../VerPacientes.php">Volver</a>
  </div>
</form>

';
    
}


    }
}

?>