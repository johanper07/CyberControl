<?php
session_start();
session_unset(); //Libera todas las variables de sesion
session_destroy(); //Destruye toda la información registrada de una sesion
header("Location: ../Vista/inicio.php");
?>