<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables

$cliente = $_POST["cliente"];
$documento = $_POST["documento"];
$direccion = $_POST["direccion"];

//consulta para insertar

$insertar = "INSERT INTO facturacliente ( cliente,documento, direccion) VALUES('$cliente','$documento','$direccion')";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

   echo'<script>alert("Información Agregada Correctamente");
   window.history.go(-1);
   </script>'; 
        
}


//cerrar conexion
mysqli_close($conexion);


?>