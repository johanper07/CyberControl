<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="CSS/estiloFacturas.css">
        
    </head>
 <body>
    <header>
  Gestión de Facturación
        
        </header>

                      
    <article>
      <a href="Interfaz%201.PHP"> <img src="imagenes/Captura.png" class="inicio"></a>
        <br><br>
 <table>
     <br>
     <div class="registro">

    <form action="../controlador/ingresarFacturasCli.php" method="post">
        <p>Cliente:</p>
        <input type="text" id="name" name="cliente" placeholder="Clientes" required />
      
       <p>Documento:</p>
       <input type="text" id="name" name="documento" placeholder="Documento" /> 
      
         <p>Dirección:</p>
       <input type="text" id="name" name="direccion" placeholder="Dirección" /> 
        
     <a> <input type="submit" name="button" id="button" value="Agregar Información" ></a>
         </form>
         
         
         
         
  <form action="../controlador/ingresarFacturas.php" method="post" >
   
<br><br>
       <td> <p> <img src="Imagenes/beer.png"> <br> Producto:</p>
        <input type="text" id="mail" name="producto" placeholder="Producto" required/></td>
      
        <td> <img src="Imagenes/plus-sign-in-a-black-circle.png"><br>  <p>Cantidad:</p>
        <input type="text" id="mail" name="cantidad" placeholder="Cantidad" required/></td>
 
         <br> <td>  <p><img src="Imagenes/dollar-coin-money.png"> <br>Precio:</p> 
        <input type="text" name="precio" placeholder="Precio" required></td>
      
                
        
      <td><a><img src="Imagenes/carsho.png"><br> <input type="submit" name="button" id="button" value="Agregar Producto" ></a></td>
      

</form>  
         </div>
      </table>
      
            </article>
<br>
     
          <a href="PDF/imprimir.php"> <input type="submit" name="button" id="button" value="Imprimir" ></a>
     <br> <br>

        <div class="formulario">
    <table border="1">
        <thead>
        <th colspan="1"><a href="facturas.php">Actualizar</a></th>
        <th colspan="8">LISTADO DE PRODUCTOS</th>
        </thead>
     <tr>
         
         <td>Id</td>
         <td>Producto</td>
         <td>Cantidad</td>
         <td>Precio</td>
         <td colspan="2">Operaciones</td> 
         <tr>
         <?php
         include("../modelo/ConexionDatos.php");
         
         $hola = "SELECT * FROM factura";
         $resul= $conexion->query($hola);
         while ($fila=$resul->fetch_assoc()){
           ?>  
             
         <tr>
             
         <td><?php echo $fila['id']; ?></td>
         <td><?php echo $fila['producto']; ?></td>
         <td><?php echo $fila['cantidad']; ?></td>
         <td><?php echo $fila['precio']; ?></td>
             
          
         <td><a href="../Controlador/modificarFactura.php?id=<?php echo $fila['id']; ?>">Modificar </a></td> 
          <td><a href="../Controlador/eliminarFactura.php?id=<?php echo $fila['id']; ?>">Eliminar </a></td>    
             
         </tr>
         
             <?php
         
         }
         ?>
         

     </table></div>
     
                  <footer>
            <center> 
            <p>Para mas informacion acerca del proveedor de esta pagina web puede dirigirse al siguiente a la linea de atencion Nacional +01 8000 21312</p>
            <p> o en Bogota al 123434 gracias por su atencion y visitenos pronto en otra ocacion</p></center>
            
        
        </footer>
    </body>

</html>