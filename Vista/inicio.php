<html >
    <body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BIENVENIDOS AL SITIO OFICIAL DE LA EMPRESA ADSI VIRTUAL</title>
 <link rel="stylesheet"  href="CSS/loginStyles.css">
</head>


<br>
<br>
    
    <div class="loginBox" >
    <img src="Imagenes/users.png" class="user">
        <h3>INICIA SESION</h3>
   
<form  method="post" action="../controlador/validarInicioSesiones.php">

      <p>Usuario: </p>
      <input name="usuario" type="text" id="login" required/>
    
      <p>Contraseña:</p>
      <input name="clave" type="password" id="pass" required/>
    

    <br> <br>
    
   <input type="submit" name="button" id="button" value="Enviar" >
    <a href="../Modelo/olvidoClave.php">¿Olvidaste tu contraseña?</a>

</form>
 </div>



</body>
</html>
