<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$id=$_REQUEST['id'];

$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$correo = $_POST["correo"];
$comentarios = $_POST["comentarios"];


//consulta para insertar

$insertar = "UPDATE clientesm SET nombre='$nombre', cedula='$cedula', telefono='$telefono', direccion='$direccion',correo='$correo', comentarios='$comentarios' WHERE id='$id'";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

       
   echo'<script>alert("Cliente modificado √©xitosamente");
   window.history.go(-1);
   </script>'; 
    header("Location: ../vista/frmClientesM.php"); 
}



//cerrar conexion
mysqli_close($conexion);


?>