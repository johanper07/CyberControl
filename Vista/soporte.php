<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>

<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="CSS/soporte.css">
        
    </head>
 <body>
    <header>
  Te ayudaremos en lo que necesites 
        
        </header>

                      
    <article>
      <a href="Interfaz_1.PHP"> <img src="imagenes/Captura.png" class="inicio"></a>
        <br><br>
        <br><br>
        <br><br>
        <br><br>
  
 <center><table border="1">
     <div class="formulario">
  <form action="php/enviar.php" method="post" >
    
        <td><p>Nombres:</p>
        <input type="text" id="name" name="nombres" placeholder="Nombres" required size="28"/></td>
      
      <td><p>Apellidos:</p>
        <input type="text" id="mail" name="apellidos" placeholder="Dirección" size="28" ></td>
   
       <td><p>Telefono:</p>
       <input type="text" id="name" name="telefono" placeholder="Telefono" size="28" required></td>

        <td><p>Correo:</p>
        <input type="email" id="mail" name="correo" placeholder="Correo Electronico" size="28" required></td>
     </table>
         <table border="1" class="tabla2">
      <tr><td><p>Escriba por favor sus inquietudes:</p>
      <textarea type="text" id="username" name="comentarios" placeholder="Escriba sus inquietudes aquí" rows="15" cols="98" required>   </textarea></td></tr>
      
        <br>
      <tr> <td><center><input type="submit" name="button" id="button" value="Enviar Información" ></center></tr></table> </center>
 </div>
</form>  
           
        
     
      
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