<?php
function seleccionar(){
    if(isset($_GET['idConsultorio'])){
$consultas = new Consultas();
$PkId = $_GET['idConsultorio'];
$filas = $consultas->cargarconsultorio($PkId);

foreach($filas as $fila){
    echo '
     <form method="post" action="ModificarConsultorio2.php">
  <div class="form-group">   
    <input name="nombre"  class="form-control"   value="'.$fila['conNombre'].'">
  </div>
  
  <div class="form-group"> 
  <td>&nbsp;</td>
  
    <input type="hidden" name="idConsultorio"  class="form-control"   value="'.$PkId.'">
  </div>
  
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-primary" href="../verConsultorios.php">Volver</a>
  </div>
</form>
';
    
}


    }
}

?>