<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$id=$_REQUEST['id'];

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];
$descripcion = $_POST["descripcion"];
$fechaVencimiento = $_POST["fechaVencimiento"];


//consulta para insertar

$insertar = "UPDATE producto SET nombre='$nombre', precio='$precio', stock='$stock', descripcion='$descripcion', fechaVencimiento='$fechaVencimiento' WHERE id='$id'";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al Acutalizar Producto");
    window.history.go(-1);
    </script>';
} else{

       
   echo'<script>alert("Productos modificado éxitosamente");
   window.history.go(-1);
   </script>'; 
    header("Location: ../vista/busqueda/motorBusqueda.php"); 
}



//cerrar conexion
mysqli_close($conexion);


?>