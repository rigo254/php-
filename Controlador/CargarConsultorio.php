<?php

function cargar(){ 
    $consultas = new Consultas();
    $filas = $consultas -> cargarconsultorios();//recibe todas las filas de la consulta 
    
    echo "<table>
    <tr>
     <th>Codigo</th>
      <th>Nombre</th>
      
    </tr>";
    
    foreach ($filas as $fila){
        echo "<tr>";
        echo "<td>".$fila['idConsultorio']."</td>";
        echo "<td>".$fila['conNombre']."</td>";
     

        echo "<td><a href='Controlador/ModificarConsultorio.php?idConsultorio=".$fila['idConsultorio']."'>Modificar</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}

function buscar($nombre){
        $consultas = new Consultas();
    $filas = $consultas -> buscarconsultorio($nombre);//recibe todas las filas de la consulta 
    
  echo "<table>
    <tr>
     <th>Codigo</th>
      <th>Nombre</th>

    </tr>";
    if(isset($filas)){
    foreach ($filas as $fila){
        echo "<tr>";
        echo "<td>".$fila['idConsultorio']."</td>";
        echo "<td>".$fila['conNombre']."</td>";
      
        echo "<td><a href='Controlador/ModificarConsultorio.php?idConsultorio=".$fila['idConsultorio']."'>Modificar</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
}

    


?>