<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>
<?php

phpinfo();

?>
<?php
}else {

     echo'<script>alert("Necesitas ingresar tus datos nuevamente");
     window.history.go(-1);
     </script>';
    header("Location: inicio.php");
    
}

?>