<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
	<title>CYBER CONTROL</title>
    <link rel="stylesheet" type="text/css" href="../CSS/estiloTablaProductosInventario.css"> 

</head>
<body>
    
    <header> Control de Inventario</header>

    <br>
     
  <a href="../Interfaz_1.PHP"> <img src="../imagenes/Captura.png" class="inicio"></a>
        <br><br>
    
<section class="principal">
  <br>
          <a href="../PDF/reporteInventario.php"><input type="submit" name="button" id="button" value="Generar Reporte" ></a>


	<div class="formulario">
		<label for="caja_busqueda">Buscar :</label>
		<input type="search" name="caja_busqueda" id="caja_busqueda">

	</div>
    <br><br><br>
    <br>
    <div class="informacion">
 <table>
	<div id="datos"></div>
    </table>
    </div>

	
</section>
    



<script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>

</html>