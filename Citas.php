<?php 
    session_start(); 
	
    if(empty($_SESSION)){
         header("location: usuarios.php");
    }else
        ?>
<?php 
$bd = new PDO ('mysql:host=localhost; dbname=centromedico','root','');

$tblmedicos = $bd->query('SELECT * FROM   medicos')     ->fetchAll(PDO::FETCH_OBJ);
$tblpacientes = $bd->query('SELECT * FROM   pacientes')     ->fetchAll(PDO::FETCH_OBJ);
$tblconsultorios = $bd->query('SELECT * FROM   consultorios')     ->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Citas</title>
  </head>
  <body>
   <?php
      require_once("Navegador.php");
      ?>
   <div class="container">
   <label for="exampleFormControlSelect2" class="col text-center">Gestion de Citas</label>
    <form method="post" action="Controlador/InsertarCitas.php">
 
  <div class="form-group">  
   <label class="col-md-6 text-left">Fecha de Cita</label> 
    <input  type="date" name="fecha" class="form-control"   required>
  </div>
  
  <div class="form-group">  
   <label class="col-md-6 text-left">Hora</label>  
    <input type="time" name="hora" class="form-control"  required>
  </div>
  <div class="form-group">
<select class="custom-select" id="inputGroupSelect01" name="paciente" required>
  <option value="0">Selenccione el paciente...</option>
   <?php foreach ($tblpacientes as $tblpacientes):?>
    <option value ="<?php echo $tblpacientes->idPaciente ?>">
    <?php echo $tblpacientes->pacNombres?>
     </option>
     <?php endforeach; ?>
  </select>
  </div>
  <div class="form-group">
<select class="custom-select" id="inputGroupSelect01" name="medico" required>
  <option value="0">Selenccione el medico...</option>
   <?php foreach ($tblmedicos as $tblmedicos):?>
    <option value ="<?php echo $tblmedicos->idMedico ?>">
    <?php echo $tblmedicos->medNombres?>
     </option>
     <?php endforeach; ?>
  </select>
  </div>
  <div class="form-group">
<select class="custom-select" id="inputGroupSelect01" name="consultorio" required>
  <option value="0">Selenccione el Consultorio...</option>
   <?php foreach ($tblconsultorios as $tblconsultorios):?>
    <option value ="<?php echo $tblconsultorios->idConsultorio ?>">
    <?php echo $tblconsultorios->conNombre?>
     </option>
     <?php endforeach; ?>
  </select>
  </div>
  

  <div><center>
  <button type="submit" class="btn btn-primary">Submit</button>
      </center>
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