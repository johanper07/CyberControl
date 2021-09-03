 <html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="../Vista/CSS/estiloModificarClientesMm.css">
        
    </head>
 <body>
    <header>
  Modificador de Facturación
        
        </header>

                      
    <article>
         <a href="../Vista/Interfaz%201.PHP"> <img src="../Vista/imagenes/Captura.png" class="inicio"></a>
     <br><br>
 <table>
     <div class="registro">
         <?php
         $id=$_REQUEST['id']; //Guardar variable del enlaze 
      
         include("../modelo/ConexionDatos.php");
                
         $hola = "SELECT * FROM factura WHERE id='$id'";
         $resul= $conexion->query($hola);
         $fila=$resul->fetch_assoc();
           ?>
         
  <form action="../controlador/modificar_Factura.php?id=<?php echo $fila['id']; ?>" method="post" >
    
       <td> <p>Producto:</p>
        <input type="text" id="mail" name="producto" placeholder="Producto" value="<?php echo $fila['producto']; ?>"/></td>
      
        <td> <p>Cantidad:</p>
        <input type="text" id="mail" name="cantidad" placeholder="Cantidad" value="<?php echo $fila['cantidad']; ?>"/></td>
 
          <td>  <p>Precio:</p> 
        <input type="text" name="precio" placeholder="Precio" required  value="<?php echo $fila['precio']; ?>"></td>
      
                
        
      <a> <input type="submit" name="button" id="button" value="Modificar Producto" ></a>
      

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