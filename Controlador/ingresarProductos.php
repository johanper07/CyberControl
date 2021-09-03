<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];
$descripcion = $_POST["descripcion"];
$fechaVencimiento = $_POST["fechaVencimiento"];



//consulta para insertar

$insertar = "INSERT INTO producto (nombre,precio,  stock, descripcion, fechaVencimiento) VALUES('$nombre','$precio', '$stock','$descripcion', '$fechaVencimiento')";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

   echo'<script>alert("Productos ingresados éxitosamente");
   window.history.go(-1);
   </script>'; 
}


//cerrar conexion
mysqli_close($conexion);


?>