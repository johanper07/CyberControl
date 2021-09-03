
<?php 

 session_start();
 require_once '../Modelo/ConexionDatos.php';
 $usu=$_REQUEST['usuario'];
 $pass=$_REQUEST['clave'];

 

 $sql=("SELECT * FROM usuarios WHERE usuario='$usu' AND clave='$pass'");
 $resultado= mysqli_query($conexion,$sql);
 $num_res= mysqli_fetch_array($resultado);

 if ($num_res>0){

 	header("location: ../vista/Interfaz_1.php" );
 } else {

 	 echo'<script>alert("Error en la Autenticacion, verifique e intentelo de nuevo");
     window.history.go(-1);
     </script>'; 
 }
   
  /*
   $_SESSION["usuario"]=$num_res["usuario"];
   $_SESSION["clave"]=$num_res["clave"]; 
*/
   $_SESSION["codigo"]=$num_res["id"];



 ?>
