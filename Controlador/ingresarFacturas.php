<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables

$cliente = $_POST["cliente"];
$documento = $_POST["documento"];
$direccion = $_POST["direccion"];


$producto = $_POST["producto"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];


//consulta para insertar

$insertar = "INSERT INTO factura ( producto,cantidad, precio) VALUES('$producto','$cantidad','$precio')";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

    header ('Location: ../vista/facturas.php');
   echo'<script>alert("Producto agregado éxitosamente");
   window.history.go(-1);
   </script>'; 
    
}


//cerrar conexion
mysqli_close($conexion);


?>