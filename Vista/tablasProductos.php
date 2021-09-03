
<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>


<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="CSS/estiloTablaProductosInventario.css">
        
    </head>
 <body>
    <header>
  
      Control  de Inventario 
        </header>
<br>
     
          <a href="Interfaz_1.PHP"> <img src="imagenes/Captura.png" class="inicio"></a>
        <br><br>
        
     
     
     
     
     <div class="informacion">   
      
         
         <br>
          <a href="PDF/reporteInventario.php"><input type="submit" name="button" id="button" value="Generar Reporte" ></a>
        
        
         <br><br>
    <table border="1">
        
        <thead>
        <th colspan="1"><a href="tablasProductos.php">Actualizar</a></th>
        <th colspan="7">Lista de Inventario</th>
        </thead>
     <tr>
         <td>Id</td>
         <td>Producto</td>
         <td>Precio</td>
         <td>Cantidad </td>
         <td>Descripción</td>
         <td>Fecha de Vencimiento</td>
         <td colspan="2">Operaciones</td> 
         <tr>
         <?php
         include("../modelo/ConexionDatos.php");
         
         $hola = "SELECT * FROM producto";
         $resul= $conexion->query($hola);
         while ($fila=$resul->fetch_assoc()){
           ?>  
             
         <tr>
             
         <td><?php echo $fila['id']; ?></td>
         <td><?php echo $fila['nombre']; ?></td>
         <td><?php echo $fila['precio']; ?></td>
         <td><?php echo $fila['stock']; ?></td>
         <td><?php echo $fila['descripcion']; ?></td>   
         <td><?php echo $fila['fechaVencimiento']; ?></td>  
             
             
             
          
         <td><a href="../Controlador/modificarProductos.php?id=<?php echo $fila['id']; ?>">Modificar </a></td> 
          <td><a href="../Controlador/eliminarProductos.php?id=<?php echo $fila['id']; ?>">Eliminar </a></td>    
             
         </tr>
         
             <?php
         
         }
         ?>
         

     </table> </div>
     <div id="datos">
     
     </div>
     
     
     <script src="JS/jquery-3.3.1.min.js"> </script>
     <script src="JS/main.js"></script>

    </body>

</html>
<?php
}else {

     echo'<script>alert("Necesitas ingresar tus datos nuevamente");
     window.history.go(-1);
     </script>';
    header("Location: inicio.php");
    
}

?>