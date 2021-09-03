<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="../Vista/CSS/estiloModificarProductos.css">
        
    </head>
 <body>
    <header>
  Modificador de Productos
        
        </header>

                      
    <article>
             <a href="../Vista/Interfaz_1.PHP"> <img src="../Vista/imagenes/Captura.png" class="inicio"></a>
        <br><br>
 <table>
     <div class="registro">
                                  <?php
          $id=$_REQUEST['id']; //Guardar variable del enlaze 
      
         include("../Modelo/ConexionDatos.php");
                
         $hola = "SELECT * FROM producto WHERE id='$id'";
         $resul= $conexion->query($hola);
         $fila=$resul->fetch_assoc();
           ?>
  <form action="../Controlador/modificar_Productos.php?id=<?php echo $fila['id']; ?>" method="post" >
    
       <td><img src="../Vista/Imagenes/box.png"><p>Producto:</p>
       <input type="text" id="name" name="nombre" placeholder="Nombre del producto..." required value="<?php echo $fila['nombre']; ?>"/></td>
      
       <td><img src="../Vista/Imagenes/cash.png"><p>Valor: <br> (unidades preferiblemente ) </p>
        <input type="text" id="mail" name="precio" placeholder="Valor por unidad.."  required value="<?php echo $fila['precio']; ?>"></td>
        
      <td><img src="../Vista/Imagenes/cantidad.png"><p>Cantidad <br>(unidades preferiblemente ) </p> 
        <input type="text" name="stock" placeholder="Cantidad..." required value="<?php echo $fila['stock']; ?>"></td>
      
       <td><img src="../Vista/Imagenes/description.png"><p>Descripción:</p>
       <input type="text" id="name" name="descripcion" placeholder="Descripción..." value="<?php echo $fila['descripcion']; ?>"> </td>
 
      <td><img src="../Vista/Imagenes/calendar.png"><p>Elija la fecha de vencimiento <br> (si la posee)</p> 
        <input type="date" name="fechaVencimiento" value="<?php echo $fila['fechaVencimiento']; ?>"></td>
 
       <input type="submit" name="button" id="button" value="Ingresar Producto" > 
            

</form>
         </div>
      </table>
      
            </article>

                       <footer>
            <center> 
            <p>Para mas informacion acerca del proveedor de esta pagina web puede dirigirse al siguiente a la linea de atencion Nacional +01 8000 21312</p>
            <p> o en Bogota al 123434 gracias por su atencion y visitenos pronto en otra ocacion</p></center>
            
        
        </footer>
     
    </body>

</html>