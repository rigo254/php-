<?php 
    session_start(); 
	
    if(empty($_SESSION)){
         header("location: usuarios.php");
    }else
        ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Medicos</title>
  </head>
  <body>
  <?php
      require_once("Navegador.php");
      ?>
   <div class="container text-center">
   <label for="exampleFormControlSelect2" class="col align-self-center">Ingreso de Medicos</label>
    <form method="post" action="Controlador/InsertarMedicos.php">
  <div class="form-group">   
    <input name="identificacion" class="form-control"  placeholder="Identificacion" required>   
  </div>
  <div class="form-group">   
    <input name="nombre" class="form-control"  placeholder="Nombres" required>
  </div>
  
  <div class="form-group">   
    <input name="apellidos" class="form-control" placeholder="Apellidos" required>
  </div>
  
   <div class="form-group">   
    <input name="especialidad" class="form-control"  placeholder="Especialidad" required>
  </div>
   <div class="form-group">   
    <input name="telefono" class="form-control"  placeholder="Telefoono" required>
  </div>
  
   <div class="form-group">   
    <input name="correo" class="form-control"  placeholder="Correo" required>
  </div>

  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
 
  </div>
  
</form>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>