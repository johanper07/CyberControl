<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="../Vista/CSS/estilosRegistro.css">
        
    </head>
 <body>
    <header>
        <center> <h1> Modifica Tu Usuario De Forma Sencilla</h1> </center>
        
        </header>
          <br> <br>
    <aside>
        <br>
        <br> <br>
   
   </aside>
                      
    <article>
 <table>
     <div class="registro">
         
         <?php
           $id=$_REQUEST['id']; //Guardar variable del enlaze 
      
         include("../modelo/ConexionDatos.php");
                
         $hola = "SELECT * FROM usuarios WHERE id='$id'";
         $resul= $conexion->query($hola);
         $fila=$resul->fetch_assoc();
           ?>
          
  <form action="../controlador/modificar_usuarios.php?id=<?php echo $fila['id']; ?>" method="post" >
    
        <p>Nombres:</p>
        <input type="text" id="name" name="nombres" placeholder="Nombres" required value="<?php echo $fila['nombres']; ?>"/>
   
       <p>Apellidos:</p>
       <input type="text" id="name" name="apellidos" placeholder="Apellidos" value="<?php echo $fila['apellidos']; ?>"/> 

        <p>Ingresa por favor tu correo electronico:</p>
        <input type="email" id="mail" name="correo" placeholder="Correo Electronico" value="<?php echo $fila['correo']; ?>"/>
 
            <p>Ingrese la fecha de nacimiento:</p> 
        <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento" required value="<?php echo $fila['fechaNacimiento']; ?>">
            
    
        <p>Elija un nombre de usuario:</p>
        <input type="text" id="username" name="usuario" placeholder="Nombre de Usuario" required value="<?php echo $fila['usuario']; ?>"/>
    

      

        <p> Cree una clave: </p> 
        <input type="password"  name="clave" id="clave1" placeholder="Cree una clave" required value="<?php echo $fila['clave']; ?>">
    <p>Confirme la clave anterior: </p> 
    <input type="password"  name="clave2" id="confirm" placeholder="Repita porfa la clave anterior" required value="<?php echo $fila['clave2']; ?>"> 
      
      
          <input type="submit" name="boton" id="button" value="Hacer Registro Corregido" >     

</form>  
       <a  href="inicio.php"> <input type="submit" name="boton" id="button" value="Validalo de una Vez"  ></a> 
         </div>
      </table>
            </article>

        
        
    </body>

</html>