<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>

<?php
   
    include("../../Modelo/ConexionDatos.php");

    $salida = "";

    $query = "SELECT * FROM producto ORDER BY id";

    if (isset($_POST['consulta'])) {
    	$q = $conexion->real_escape_string($_POST['consulta']);
    	$query = "SELECT id, nombre, precio, stock, descripcion, fechaVencimiento FROM producto WHERE id LIKE '%".$q. "%' OR nombre LIKE '%".$q. "%' OR precio LIKE '%".$q. "%' OR stock LIKE '%".$q. "%' OR descripcion LIKE '%".$q. "%' OR fechaVencimiento LIKE '%".$q. "%' ";
    }

    $resultado = $conexion->query($query);


      if($resultado->num_rows >0){
     $salida.="<table class='tabla_datos'>
              <thead>
              <tr>
                <td> ID </td>
                <td>Producto</td>
                <td>Precio </td>
                <td>Cantidad</td>
                <td>Descripción</td>
                <td>Fecha de Vencimiento</td>
                <td colspan='2''>Operaciones</td>
                <tr>
         
              </thead>
              <tbody>";

     while ($fila = $resultado->fetch_assoc()){

         $salida.="<tr>
                   <td>".$fila['id']."</td>
                   <td>".$fila['nombre']."</td>
                   <td>$".$fila['precio']."</td>
                   <td>".$fila['stock']."</td>
                   <td>".$fila['descripcion']."</td>
                   <td>".$fila['fechaVencimiento']."</td>
                   <td><a href='../../Controlador/modificarProductos.php?id=".$fila['id']."'>Modificar</a></td>
                   <td><a href='../../Controlador/eliminarProductos.php?id=".$fila['id']."'>Eliminar</a></td>
                   
            </tr>";
         
     }
     
     $salida.="</tbody></table>";
     
     
 } else{
     
     $salida.="No hay datos :( ";
 }

 echo $salida;
    $conexion->close();



?>

<?php
}else {

     echo'<script>alert("Necesitas ingresar tus datos nuevamente");
     window.history.go(-1);
     </script>';
    header("Location: inicio.php");
    
}