<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$id=$_REQUEST['id'];


$producto = $_POST["producto"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];


//consulta para insertar

$insertar = "UPDATE factura SET producto='$producto', cantidad='$cantidad', precio='$precio'  WHERE id='$id'";

      

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
    header("Location: ../vista/facturas.php"); 
}



//cerrar conexion
mysqli_close($conexion);


?>