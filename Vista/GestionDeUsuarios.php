<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>
<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="CSS/estiloGestionesUsuarios.css">
        
    </head>
 <body>
    <header>
  Gestión y control de Usuarios
        
        </header>

            
                   
    <article>
        <br>
        <a href="Interfaz_1.PHP"> <img src="imagenes/Captura.png" class="inicio"></a>
        
        <br><br>
     <div class="informacion">
         <a href="PDF/reporteControlUsuarios.php"><input type="submit" name="button" id="button" value="Generar Reporte" ></a>
   <table border="1">
        <thead>
        <th colspan="9">Listado de Usuarios Vigentes en el Sistema</th>
        </thead>
     <tr>
         
         <td><b>Id</b> </td>
         <td><b>Nombres</b> </td>
         <td><b>Apellidos</b></td>
         <td><b>Correo</b> </td>
         <td><b>Fecha de Nacimiento</b> </td>
         <td><b>Nombre de Usuario</b> </td>
         <td><b>Contraseña</b> </td>
         <td colspan="2"><b>Operaciones</b></td> 
         <tr> 
         <?php
         include("../modelo/ConexionDatos.php");
         
         $hola = "SELECT * FROM usuarios";
         $resul= $conexion->query($hola);
         while ($fila=$resul->fetch_assoc()){
           ?>  
             
         <tr>
             
         <td><?php echo $fila['id']; ?></td>
         <td><?php echo $fila['nombres']; ?></td>
         <td><?php echo $fila['apellidos']; ?></td>
         <td><?php echo $fila['correo']; ?></td>
         <td><?php echo $fila['fechaNacimiento']; ?></td>
         <td><?php echo $fila['usuario']; ?></td>
         <td><?php echo $fila['clave']; ?></td>
             
          
         <td><a href="../Controlador/modificarUsuarios.php?id=<?php echo $fila['id']; ?>">Modificar </a></td> 
          <td><a href="../Controlador/eliminarGestionUsuarios.php?id=<?php echo $fila['id']; ?>">Eliminar </a></td>    
             
         </tr>
         
             <?php
         
         }
         ?>
         

     </table></div>
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