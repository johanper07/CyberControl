<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>
 <html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="../Vista/CSS/estiloModificarClientesMm.css">
        
    </head>
 <body>
    <header>
  Modificador de valores
        
        </header>

                      
    <article>
         <a href="../Vista/Interfaz_1.PHP"> <img src="../Vista/imagenes/Captura.png" class="inicio"></a>
     <br><br>
 <table>
     <div class="registro">
                                  <?php
          $id=$_REQUEST['id']; //Guardar variable del enlaze 
      
         include("../modelo/ConexionDatos.php");
                
         $hola = "SELECT * FROM clientesm WHERE id='$id'";
         $resul= $conexion->query($hola);
         $fila=$resul->fetch_assoc();
           ?>
   <form action="../controlador/modificar_ClientesM.php?id=<?php echo $fila['id']; ?>" method="post" >
    
        <td><img src="../Vista/Imagenes/man-user.png"><p>Nombre:</p>
        <input type="text" id="name" name="nombre" placeholder="Nombres..." required value="<?php echo $fila['nombre']; ?>"/></td>
   
       <td><img src="../Vista/Imagenes/id-card.png"><p>Cedula:</p>
       <input type="text" id="name" name="cedula" placeholder="cedula..." value="<?php echo $fila['cedula']; ?>"/> </td>

        <td><img src="../Vista/Imagenes/call.png"><p>Telefono:</p>
        <input type="text" id="mail" name="telefono" placeholder="Telefono.." value="<?php echo $fila['telefono']; ?>" /></td>
       
        <td><img src="../Vista/Imagenes/adress.png"><p>Dirección:</p>
        <input type="text" id="mail" name="direccion" placeholder="Dirección.." value="<?php echo $fila['direccion']; ?>" /></td>
 
        <td><img src="../Vista/Imagenes/email.png"><p>Correo:</p> 
        <input type="email" name="correo" placeholder="Correo..." required value="<?php echo $fila['correo']; ?>"></td>
            
         

         <td><img src="../Vista/Imagenes/comment.png"><p>Comentarios:</p>
         <input type="text"  id="username" size="30" maxlength="1000"  name="comentarios" placeholder="Escriba sus comentarios aquí" value="<?php echo $fila['comentarios']; ?>">
       </td>
        
       <input type="submit" name="button" id="button" value="Registrar Cliente" >

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
<?php
}else {

     echo'<script>alert("Necesitas ingresar tus datos nuevamente");
     window.history.go(-1);
     </script>';
    header("Location: inicio.php");
    
}

?>