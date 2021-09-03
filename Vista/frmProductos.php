
<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>
   
<html lang="es">
    <head> 
        <link rel="shortcut icon" href="Imagenes/magenes/CYBERCONTROL.ic "/>
    <title> CYBER CONTROL</title>
        <script src="JS/regis-clave.js"></script>
        <link rel="stylesheet"  href="CSS/estilosProductos.css">
        
    </head>
 <body>
    <header>
  Ingresa los productos para poder completar tu inventario
        
        </header>

                      
    <article>
        <br>
        <a href="Interfaz_1.PHP"> <img src="imagenes/Captura.png" class="inicio"></a>
     
 <table>
     <div class="formulario">
  <form action="../controlador/ingresarProductos.php" method="post" >
    
       <td><img src="Imagenes/box.png"><p>Producto:</p>
        <input type="text" id="name" name="nombre" placeholder="Producto..." required /></td>
              
        <td><img src="Imagenes/cash.png"><p>Valor: <br> (unidades preferiblemente ) </p>
        <input type="text" id="mail" name="precio" placeholder="Valor por unidad.."  required></td>
        
      <td><img src="Imagenes/cantidad.png"><p>Cantidad <br>(unidades preferiblemente ) </p> 
        <input type="text" name="stock" placeholder="Cantidad..." required></td>
      
       <td><img src="Imagenes/description.png"><p>Descripción:</p>
       <input type="text" id="name" name="descripcion" placeholder="Descripcioó..." /> </td>
 
     <td><img src="Imagenes/calendar.png"><p>Elija la fecha de vencimiento <br> (si la posee)</p> 
        <input type="date" name="fechaVencimiento" ></td>
            
        
       <td><input type="submit" name="button" id="button" value="Ingresar Productos a la base de datos" > </td>
    
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