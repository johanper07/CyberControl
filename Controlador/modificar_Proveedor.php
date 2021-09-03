<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$id=$_REQUEST['id'];
$nombres = $_POST["nombres"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$direccion = $_POST["direccion"];
$empresa = $_POST["empresa"];
$comentarios = $_POST["comentarios"];



//consulta para insertar

$insertar = "UPDATE proveedores SET nombres='$nombres', telefono='$telefono', correo='$correo', direccion='$direccion',empresa='$empresa', comentarios='$comentarios' WHERE id='$id'";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

       
   echo'<script>alert("Proveedor modificado éxitosamente");
   window.history.go(-1);
   </script>'; 
    header("Location: ../vista/proveedores.php"); 
}



//cerrar conexion
mysqli_close($conexion);


?>