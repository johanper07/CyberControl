<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$id=$_REQUEST['id'];




//consulta para insertar

$insertar = "DELETE FROM clientes WHERE id='$id' ";

      

//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

       
   echo'<script>alert("Cliente eliminado éxitosamente");
   window.history.go(-1);
   </script>'; 
    header("Location: ../vista/frmClientesP.php"); 
}



//cerrar conexion
mysqli_close($conexion);


?>