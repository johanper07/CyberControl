<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>

<html lang="es">
    <head>
        <link rel="shortcut icon" href="../Imagenes/CYBERCONTROL.ico "/>
    <title> CYBER CONTROL</title>
        <link rel="shortcut icon" href="../Imagenes/CYBERCONTROL.ico "/>
        
        <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet"  href="CSS/estiloClientes.css">
         <script type="text/javascript">
   
        
    
        function openVentana2(){
        $(".ventana").slideDown("slow");
    }
        function cerrarVentana(){
        $(".ventana").slideUp("fast");
    }
        
        
    </script>
        
    </head>
    <body>
    <header>
        <center> <h1> Bienvenido  Usuario</h1> </center>
         
        </header>
    <aside>
        <div class="ventana">>
        <div class="form">
            <div class="cerrar"><a href="javascript:cerrarVentana();">Cerrar X</a></div>
            <h1>Análisis de Seguridad</h1> <hr>
            <form action="../controlador/validarAnalisis.php" method="post">
            <table>
            <tr>
            <td>Escriba su Clave para continuar:</td>
            <td> <input type="password" placeholder="Ingrese nuevamente la Clave para continuar" name="clave" required></td>
                
            </tr>
                <tr>
                    <td></td>
                    
                <td><input type="submit" value="Ingresar" class="botones"></td>
                </tr>
            
            
            </table></form>
            
            </div>
        </div>
        <br> <br>
        <br> 
       <a href="Interfaz_1.PHP"> <img src="imagenes/Captura.png" class="ima1"> </a>
             <div class="barra">    <nav>
					<ul>
                        <li> <a href="clientes.php"
                                >Registros</a> </li>
                        <li> <a href="javascript:openVentana2();">Gestión de Usuarios</a> </li>
						<li><a href="informacion.php">Manuales del Usuario</a></li>
                        <li><a href="../Modelo/info.php">Información técnica</a></li>
                        <li class="irse"><a href="../Controlador/cerrarSession.php">Cerrar sesion</a></li>
					</ul>
				</nav>
                  
          </div>
       
        
        </aside> 
    <article>
           <br> <br> 
        <br> <br>
             <br> <br>
      <div class="hands">  
        <h1> 
            <img src="imagenes/point-at.png" class="">
            Elija la opcion que mejor de adapte a las necesidades
            <img src="imagenes/point-at.png" class="">
        </h1></div>
        <br> <br> 
        
             <br> <br> <center>
                               <div class="buttom1">
								<h2> <a href="frmClientesM.php"> MAYORISTAS</a>  </h2>
								<img src="imagenes/girl.png" width="100" class="pic1" alt="">
							</div>

							<div class="buttom2">
								<h2> <a href="frmClientesP.php"> PREFERENCIALES</a> </h2>
								<img src="imagenes/man1.png" width="100" class="pic2" alt="">
							</div> </center>

     
                  
   
            </article>
        

        <br> <br><br> <br> <br> 
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