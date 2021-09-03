<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$nombres = $_POST["nombres"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$direccion = $_POST["direccion"];
$empresa = $_POST["empresa"];
$comentarios = $_POST["comentarios"];


//consulta para insertar

$insertar = "INSERT INTO proveedores (nombres, telefono, correo, direccion, empresa, comentarios) VALUES('$nombres','$telefono', '$correo', '$direccion','$empresa','$comentarios')";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

   echo'<script>alert("Proveedor registrado éxitosamente");
   window.history.go(-1);
   </script>'; 
}


//cerrar conexion
mysqli_close($conexion);


?>