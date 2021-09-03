<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>

<html lang="es">
    <head> 
        <link rel="shortcut icon" href="../Imagenes/CYBERCONTROL.ico "/>
    <title> CYBER CONTROL</title>
        <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet"  href="../Vista/CSS/estiloInterfaz1.css">
         
        
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
        <img src="imagenes/Captura.png" class="ima1">
             <div class="barra">    <nav>
					<ul>
                        <li> <a href="Interfaz_1.PHP">Registros</a> </li>
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
        <br> <br> 
        <br> <br> <center>
                            <div class="buttom1">
								<h2> <a href="proveedores.PHP"> Proveedores </a>  </h2>
								<img src="Imagenes/team.png" width="100" class="pic1" alt="">
							</div>

							<div class="buttom2">
								<h2> <a href="clientes.PHP"> Clientes</a> </h2>
								<img src="Imagenes/network.png" width="100" class="pic2" alt="">
							</div>

							<div class="buttom3">
								<h2> <a href="frmProductos.php"> Productos </a>  </h2>
								<img src="Imagenes/loyalty.png" width="100" class="pic3" alt="">
							</div>

							<div class="buttom4">
								<h2> <a href="soporte.php"> Soporte técnico </a>  </h2>
								<img src="Imagenes/earn.png" width="100" class="pic4" alt="">
							</div>
									<div class="buttom5">
								<h2> <a href="facturacion/index.php"> Facturacion </a>  </h2>
								<img src="Imagenes/dollar-bill.png" width="100" class="pic5" alt="">
							</div>
                  							<div class="buttom6">
								<h2> <a href="tablasProductos.php"> Inventario </a>  </h2>
								<img src="Imagenes/pack.png" width="100" class="pic6" alt="">
							</div>
        </center>
                  
                  
   
            </article>
        

        
        <footer>
            <center> 
            <p>Propiedad intelectual de la Cigarreria San Marcos LA</p>
            <p> Diseñado especificamente para el comercio de productos al por mayor y mayoristas.</p></center>
            
        
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