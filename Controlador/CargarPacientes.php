<?php

function cargar(){ 
    $consultas = new Consultas();
    $filas = $consultas -> cargarpaciente();//recibe todas las filas de la consulta 
    
    echo "<table>
    <tr>
     <th>Codigo</th>
     <th>Identificacion</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Fecha</th>
      <th>Sexo</th>
      
      
    </tr>";
    
    foreach ($filas as $fila){
        echo "<tr>";
        echo "<td>".$fila['idPaciente']."</td>";
        echo "<td>".$fila['pacIdentificacion']."</td>";
        echo "<td>".$fila['pacNombres']."</td>";
        echo "<td>".$fila['pacApellidos']."</td>";
        echo "<td>".$fila['pacFechaNacimiento']."</td>";
        echo "<td>".$fila['pacSexo']."</td>";
     

        echo "<td><a href='Controlador/ModificarPaciente.php?idPaciente=".$fila['idPaciente']."'>Modificar</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
function buscar($Observaciones){
        $consultas = new Consultas();
    $filas = $consultas -> buscarpaciente($Observaciones);//recibe todas las filas de la consulta 
    
   echo "<table>
    <tr>
     <th>Codigo</th>
     <th>Identificacion</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Fecha</th>
      <th>Sexo</th>
      
      
    </tr>";
    if(isset($filas)){
    foreach ($filas as $fila){
         echo "<tr>";
        echo "<td>".$fila['idPaciente']."</td>";
        echo "<td>".$fila['pacIdentificacion']."</td>";
        echo "<td>".$fila['pacNombres']."</td>";
        echo "<td>".$fila['pacApellidos']."</td>";
        echo "<td>".$fila['pacFechaNacimiento']."</td>";
        echo "<td>".$fila['pacSexo']."</td>";
     

        echo "<td><a href='Controlador/ModificarPaciente.php?idPaciente=".$fila['idPaciente']."'>Modificar</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
}
?>
