<?php

function cargar(){ 
    $consultas = new Consultas();
    $filas = $consultas -> cargarmedico();//recibe todas las filas de la consulta 
    
    echo "<table>
    <tr>
     <th>Codigo</th>
     <th>Identificacion</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Especialidad</th>
      <th>Telefono</th>
      <th>Correo</th>
      
      
    </tr>";
    
    foreach ($filas as $fila){
        echo "<tr>";
        echo "<td>".$fila['idMedico']."</td>";
        echo "<td>".$fila['medIdentificacion']."</td>";
        echo "<td>".$fila['medNombres']."</td>";
        echo "<td>".$fila['medApellidos']."</td>";
        echo "<td>".$fila['medEspecialidad']."</td>";
        echo "<td>".$fila['medTelefono']."</td>";
        echo "<td>".$fila['medCorreo']."</td>";
     

        echo "<td><a href='Controlador/Modificarmedico.php?idMedico=".$fila['idMedico']."'>Modificar</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
function buscar($Observaciones){
        $consultas = new Consultas();
    $filas = $consultas -> buscarmedicos($Observaciones);//recibe todas las filas de la consulta 
    
   echo "<table>
    <tr>
     <th>Codigo</th>
     <th>Identificacion</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Especialidad</th>
      <th>Telefono</th>
      <th>Correo</th>
      
      
    </tr>";
    
    if(isset($filas)){
    foreach ($filas as $fila){
          echo "<tr>";
        echo "<td>".$fila['idMedico']."</td>";
        echo "<td>".$fila['medIdentificacion']."</td>";
        echo "<td>".$fila['medNombres']."</td>";
        echo "<td>".$fila['medApellidos']."</td>";
        echo "<td>".$fila['medEspecialidad']."</td>";
        echo "<td>".$fila['medTelefono']."</td>";
        echo "<td>".$fila['medCorreo']."</td>";
     

        echo "<td><a href='Controlador/Modificarmedico.php?idMedico=".$fila['idMedico']."'>Modificar</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
}
?>