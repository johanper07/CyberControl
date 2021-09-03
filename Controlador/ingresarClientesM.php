<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$correo = $_POST["correo"];
$comentarios = $_POST["comentarios"];


//consulta para insertar

$insertar = "INSERT INTO clientesm (nombre, cedula, telefono, direccion,correo, comentarios) VALUES('$nombre','$cedula', '$telefono','$direccion','$correo','$comentarios')";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

    header ('Location: ../vista/frmClientesM.php');
   echo'<script>alert("Cliente mayorista registrado éxitosamente");
   window.history.go(-1);
   </script>'; 
    
}


//cerrar conexion
mysqli_close($conexion);


?>