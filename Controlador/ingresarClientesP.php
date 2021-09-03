<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$comentarios = $_POST["comentarios"];


//consulta para insertar

$insertar = "INSERT INTO clientes (nombre, cedula, telefono, correo, comentarios) VALUES('$nombre','$cedula', '$telefono','$correo','$comentarios')";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

   echo'<script>alert("Cliente Preferencial registrado éxitosamente");
   window.history.go(-1);
   </script>'; 
}


//cerrar conexion
mysqli_close($conexion);


?>