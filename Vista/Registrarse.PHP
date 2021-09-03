<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>
<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="CSS/estilosRegistro.css">
        
    </head>
 <body>
    <header>
        <center> <h1> Abre una cuenta de forma rápida y facilL</h1> </center>
        
        </header>
    <aside>
   
   
   </aside>
                      
    <article>
 <table>
     <div class="registro">
  <form action="../controlador/validarRegistroUsuarios.php" method="post" >
    
        <p>Nombres:</p>
        <input type="text" id="name" name="nombres" placeholder="Nombres" required/>
   
       <p>Apellidos:</p>
       <input type="text" id="name" name="apellidos" placeholder="Apellidos" /> 

        <p>Ingresa por favor tu correo electronico:</p>
        <input type="email" id="mail" name="correo" placeholder="Correo Electronico" />
 
            <p>Ingrese la fecha de nacimiento:</p> 
        <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento" required>
            
    
        <p>Elija un nombre de usuario:</p>
        <input type="text" id="username" name="usuario" placeholder="Nombre de Usuario" required/>
    

      

        <p> Cree una clave: </p> 
        <input type="password"  name="clave" id="clave1" placeholder="Cree una clave" required>
    <p>Confirme la clave anterior: </p> 
    <input type="password"  name="clave2" id="confirm" placeholder="Repita porfa la clave anterior" required>     
          <input type="submit" name="boton" id="button" value="Hacer Registro" >     

</form>  
       <a  href="inicio.php"> <input type="submit" name="boton" id="button" value="Comienza ya!!"  ></a> 
         </div>
      </table>
            </article>

        
        
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