<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>

<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="CSS/estiloClientesP.css">
        
    </head>
 <body>
    <header>
  
        Vista de clientes preferenciales
        </header>

                      
    <article>
          <a href="Interfaz_1.PHP"> <img src="imagenes/Captura.png" class="inicio"></a>
     <br><br>
 <table>
     <div class="formulario">
  <form action="../controlador/ingresarClientesP.php" method="post" >
    
       <td><img src="Imagenes/man-user.png"><p>Nombre:</p>
        <input type="text" id="name" name="nombre" placeholder="Nombres..." required/></td>
   
      <td><img src="Imagenes/id-card.png"><p>Cedula:</p>
       <input type="text" id="name" name="cedula" placeholder="Cedula..." /> </td>

       <td><img src="Imagenes/call.png"><p>Telefono:</p>
        <input type="text" id="mail" name="telefono" placeholder="Telefono.." /> </td>
 
          <td><img src="Imagenes/email.png"><p>Correo:</p> 
        <input type="email" name="correo" placeholder="Correo..." required></td>
            
    
        <td><img src="Imagenes/comment.png"><p>Comentarios:</p>
      <textarea type="text" id="username" name="comentarios" placeholder="Escriba sus comentarios aquí" rows="10" cols="45" >   </textarea></td>
        
       <input type="submit" name="button" id="button" value="Registrar Cliente" >

</form>  
         <a href="PDF/reporteClientesPreferenciales.php"><input type="submit" name="button" id="button" value="Generar Reporte" ></a>
         
         </div>
      </table>
      
            </article>
<br>
        <div class="informacion">
    <table border="1">
        <thead>
        <th colspan="1"><a href="frmClientesP.php">Actualizar</a></th>
        <th colspan="7">Lista de Clientes Preferenciales</th>
        </thead>
     <tr>
         
          <td><b>Id</b></td>
         <td><b>Nombres</b></td>
         <td><b>cedula</b></td>
         <td><b>Telefono</b></td>
         <td><b>Dirección</b></td>
         <td><b>Correo</b></td>
         <td><b>Comentarios</b></td>
         <td colspan="2"><b>Operaciones</b></td> 
         <tr>
         <?php
         include("../modelo/ConexionDatos.php");
         
         $hola = "SELECT * FROM clientes";
         $resul= $conexion->query($hola);
         while ($fila=$resul->fetch_assoc()){
           ?>  
             
         <tr>
             
         <td><?php echo $fila['id']; ?></td>
         <td><?php echo $fila['nombre']; ?></td>
         <td><?php echo $fila['cedula']; ?></td>
         <td><?php echo $fila['telefono']; ?></td>
         <td><?php echo $fila['correo']; ?></td>
         <td><?php echo $fila['comentarios']; ?></td>
             
          
         <td><a href="../Controlador/modificarClientesP.php?id=<?php echo $fila['id']; ?>">Modificar </a></td> 
          <td><a href="../Controlador/eliminarClientesP.php?id=<?php echo $fila['id']; ?>">Eliminar </a></td>    
             
         </tr>
         
             <?php
         
         }
         ?>
         

     </table>
     </div>
     
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