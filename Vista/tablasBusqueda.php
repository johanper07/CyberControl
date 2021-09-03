<?php
include("../modelo/ConexionDatos.php");

//para hacer funcionar la barra de busqueda

$salida = "";
$query = "SELECT * FROM inventario ORDER BY id ";

if(isset($_POST['consulta'])) {
    
    $q = $mysqli->real_escape_string($_POST['co nsulta']);
    $query= "SELECT id, producto, descripcion, valor, cantidad, fechaVencimineto WHERE producto LIKE '%".$q."%' OR descripcion LIKE '%".$q."%' OR valor LIKE '%".$q."%' OR cantidad LIKE '%".$q."%' OR  fechaVencimiento LIKE '%".$q."%' " ;
}

$resultado = $mysqli->query($query);
 if($resultado->num_rows > 0){
     
     $salida.= "
     <table class='tabla_datos'>
     <thead>
       <tr>
       <td>Id</td>
         <td>Producto</td>
         <td>Descripción</td>
         <td>Valor Unidad</td>
         <td>Cantidad <br> por Unidades</td>
         <td>Fecha de Vencimiento</td>
       </tr>
        </thead>
        <tbody>";
     
     while($fila= $resultado->fetch_assoc()){
         $salida.=" <tr> 
         
         <td>".$fila['id']."</td>
         <td>".$fila['productos']."</td>
         <td>".$fila['descripcion']."</td>
         <td>".$fila['valor']."</td>
         <td>".$fila['cantidad']."</td>
         <td>".$fila['fechaVencimiento']."</td>
         </tr> ";
         
     }
     
     $salida.="</tbody></table";
 } else{
     $salida.="No hay datos :(";
 }
echo $salida;
$mysqli->close();


?>