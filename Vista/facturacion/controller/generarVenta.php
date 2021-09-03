<?php
require_once "../model/Data.php";
session_start();

$carrito = $_SESSION["carrito"];
$total = $_SESSION["total"];

if(count($carrito) == 0){
	echo'<script>alert("Seleccione por favor un producto de la lista ");
   window.history.go(-1);
   </script>';
      // session_unset($carrito);
    } else{


$d = new Data();

$d->crearVenta($carrito, $total);



// remover el carrito de compra
unset($_SESSION["carrito"]);
// remover el total
unset($_SESSION["total"]);
// redirigir hacia index
header("location: ../index.php"); }
?>
