<?php
include "../modelo/ConexionDatos.php";


$clave = $_POST["clave"];


//Metodo de consulta 
$consulta= "SELECT * FROM usuarios WHERE  clave='$clave'";

//Ejecutar la consulta

$resultado=mysqli_query($conexion, $consulta);

//Validacion de cargo


//Metodo de logica

$filas=mysqli_num_rows($resultado); //si cohensida va a dar un resultado

if($filas>0){
    header("location: ../vista/GestionDeUsuarios.php" );
    
}else{
     echo'<script>alert("Error en la Verificación, verifique e intentelo de nuevo");
         window.history.go(-1);
     </script>';
}

mysqli_free_result($resultado); //que libere datos para no consumir más espacio de memoria
mysqli_close($conexion); //Cerrar la conexion para la mejora de rendimiento
?>