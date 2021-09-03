
<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>
<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="CSS/estiloProveedores.css">
        
    </head>
 <body>
    <header>
  Gestión de proveedores
        
        </header>

                      
    <article>
      <a href="Interfaz_1.PHP"> <img src="imagenes/Captura.png" class="inicio"></a>
        <br><br>
 <table>
     <div class="registro">
  <form action="../controlador/ingresarProveedor.php" method="post" >
    
        <td><img src="Imagenes/man-user.png"> <p>Nombres:</p>
        <input type="text" id="name" name="nombres" placeholder="Nombres" required/></td>
   
       <td><img src="Imagenes/call.png"><p>Telefono:</p>
       <input type="text" id="name" name="telefono" placeholder="Telefono" /> </td>

       <td><img src="Imagenes/email.png"> <p>Correo:</p>
        <input type="email" id="mail" name="correo" placeholder="Correo Electronico" /></td>
      
        <td><img src="Imagenes/adress.png"> <p>Dirección:</p>
        <input type="text" id="mail" name="direccion" placeholder="Dirección" /></td>
 
          <td> <img src="Imagenes/factory.png"> <p>Empresa:</p> 
        <input type="text" name="empresa" placeholder="Empresa" required></td>
            
    
        <td><img src="Imagenes/comment.png"><p>Comentarios:</p>
      <textarea type="text" id="username" name="comentarios" placeholder="Escriba sus comentarios aquí" rows="10" cols="45" >   </textarea></td>
      
        
       <input type="submit" name="button" id="button" value="Registrar Proveedor" >

</form>  
           <a href="PDF/reporteProveedores.php"><input type="submit" name="button" id="button" value="Generar Reporte" ></a>
         </div>
      </table>
      
            </article>
<br>
        <div class="ormulario">
    <table border="1">
        <thead>
        <th colspan="1"><a href="proveedores.php">Actualizar</a></th>
        <th colspan="8">Lista Proveedores</th>
        </thead>
     <tr>
         
         <td><b>Id</b></td>
         <td><b>Nombres</b></td>
         <td><b>Telefono</b></td>
         <td><b>Correo</b></td>
         <td><b>Dirección</b></td>
         <td><b>Empresa</b></td>
         <td><b>Comentarios</b></td>
         <td colspan="2"><b>Operaciones</b></td> 
         <tr>
         <?php
         include("../Modelo/ConexionDatos.php");
         
         $hola = "SELECT * FROM proveedores";
         $resul= $conexion->query($hola);
         while ($fila=$resul->fetch_assoc()){
           ?>  
             
         <tr>
             
         <td><?php echo $fila['id']; ?></td>
         <td><?php echo $fila['nombres']; ?></td>
         <td><?php echo $fila['telefono']; ?></td>
         <td><?php echo $fila['correo']; ?></td>
         <td><?php echo $fila['direccion']; ?></td>
         <td><?php echo $fila['empresa']; ?></td>
         <td><?php echo $fila['comentarios']; ?></td>
             
          
         <td><a href="../Controlador/modificarProveedor.php?id=<?php echo $fila['id']; ?>">Modificar </a></td> 
          <td><a href="../Controlador/eliminarProveedores.php?id=<?php echo $fila['id']; ?>">Eliminar </a></td>    
             
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
<?php
}else {

     echo'<script>alert("Necesitas ingresar tus datos nuevamente");
     window.history.go(-1);
     </script>';
    header("Location: inicio.php");
    
}

?>