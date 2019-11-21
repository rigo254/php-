<?php

function cargar(){ 
    $consultas = new Consultas();
    $filas = $consultas -> cargarcita();//recibe todas las filas de la consulta 
    
    echo "<table>
    <tr>
     <th>Codigo</th>
     <th>Fecha</th>
      <th>Hora</th>
      <th>Paciente</th>
      <th>Medico</th>
      <th>Consultorio</th>
      <th>Estado</th>
      <th>Obsevaciones</th>
      
      
    </tr>";
    
    foreach ($filas as $fila){
        $db = new PDO('mysql:host=localhost;dbname=centromedico;','root','');
        echo "<tr>";
        echo "<td>".$fila['idCita']."</td>";
        echo "<td>".$fila['citFecha']."</td>";
        echo "<td>".$fila['citHora']."</td>";
        foreach ($paciente=$db->query('select * from pacientes') as $paciente){
            if($fila['citPaciente']==$paciente['idPaciente']){
                echo "<td>".$paciente['pacNombres']."</td>";
            }
        }
        foreach ($medico=$db->query('select * from medicos') as $medico){
            if($fila['citMedico']==$medico['idMedico']){
                echo "<td>".$medico['medNombres']."</td>";
            }
        }
        foreach ($medico=$db->query('select * from consultorios') as $medico){
            if($fila['citConsultorio']==$medico['idConsultorio']){
                echo "<td>".$medico['conNombre']."</td>";
            }
        }
        

         echo "<td>".$fila['citEstado']."</td>";
        echo "<td>".$fila['citObservaciones']."</td>";
     

        echo "<td><a href='Controlador/ModificarCita.php?idCita=".$fila['idCita']."'>Atender</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}

function buscar($Observaciones){
        $consultas = new Consultas();
    $filas = $consultas -> buscarcitas($Observaciones);//recibe todas las filas de la consulta 
    
  echo "<table>
    <tr>
     <th>Codigo</th>
     <th>Fecha</th>
      <th>Hora</th>
      <th>Paciente</th>
      <th>Medico</th>
      <th>Consultorio</th>
      <th>Estado</th>
      <th>Obsevaciones</th>
      
      
    </tr>";
    if(isset($filas)){
    foreach ($filas as $fila){
        echo "<tr>";
        echo "<td>".$fila['idCita']."</td>";
        echo "<td>".$fila['citFecha']."</td>";
        echo "<td>".$fila['citHora']."</td>";
        echo "<td>".$fila['pacNombres']."</td>";
        echo "<td>".$fila['medNombres']."</td>";
        echo "<td>".$fila['conNombre']."</td>";
        echo "<td>".$fila['citEstado']."</td>";
        echo "<td>".$fila['citObservaciones']."</td>";
     


    
        echo "<td><a href='Controlador/ModificarCita.php?idCita=".$fila['idCita']."'>Modificar</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
}
?>