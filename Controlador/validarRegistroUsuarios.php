<?php  
include "../modelo/ConexionDatos.php";
 

//recibir datos para almacenar en las variables
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$fechaNaci = $_POST["fechaNacimiento"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$clave2 = $_POST["clave2"];

//consulta para insertar

$insertar = "INSERT INTO usuarios (nombres, apellidos, correo, fechaNacimiento, usuario,  clave, clave2) VALUES('$nombres','$apellidos', '$correo','$fechaNaci','$usuario', '$clave','$clave2')";



      //Para invalidar contraseñas iguales
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

   echo'<script>alert("Usuario registrado éxitosamente");
   window.history.go(-1);
   </script>'; 
}




//cerrar conexion
mysqli_close($conexion);

?>