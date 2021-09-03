<?php

include "../modelo/ConexionDatos.php";
//recibir datos para almacenar en las variables
$id=$_REQUEST['id'];

$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$fechaNacimiento = $_POST["fechaNacimiento"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$clave2 = $_POST["clave2"];



//consulta para insertar

$insertar = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', correo='$correo', fechaNacimiento='$fechaNacimiento',usuario='$usuario', clave='$clave' ,clave2='$clave2'  WHERE id='$id'";

      


      if ($clave==$clave2){
           
      }else {
          echo'<script>alert("Las Contraseñas no coinciden, Por favor intente nuevamente");
           window.history.go(-1);
          </script>';
          exit;
      }


//ejecutar consulta con la base de datos

    $resultado = mysqli_query ($conexion, $insertar);
if(!$resultado){
    echo'<script>alert("Error al registrarse");
    window.history.go(-1);
    </script>';
} else{

       
   echo'<script>alert("Registro modificado éxitosamente");
   window.history.go(-1);
   </script>'; 
    header("Location: ../vista/GestionDeUsuarios.php"); 
}



//cerrar conexion
mysqli_close($conexion);


?>