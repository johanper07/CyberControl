<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>
<html>
   
    <head>    
    <title>CYBER CONTROL</title>
    <link rel="stylesheet" href="CSS/estilosInformacion.css">
    </head>
    
    <body>


        <br><br>
        <a href="Interfaz_1.PHP"> <img src="Imagenes/Captura.PNG" class="inicio"></a>
        <br>

        
        <div class="container">
        <h1> <i>       Manuales del Usuario</i></h1>   
<br><br>
<div class="contenido"> 
        <p><h3> Proposito</h3>
            El siguiente documento tiene como propósito generar los manuales de usuario y técnico que servirán para que el usuario final de la cigarrería san marcos, quien será la propietaria del sistema pueda utilizar cada una de las partes dentro del software y posea el conocimiento y función de cada una de estas, dando así por hecho el correcto uso del sistema.
           <h3> Definiciones, acrónimos y abreviaturas</h3> <br>
           <h3> Software: </h3>
           <p> Conjunto de programas y rutinas que permiten a la computadora realizar determinadas tareas.</p>
           <h3> Dominio:  </h3>
           <p> Dominio web también conocido como domain en inglés, es una dirección o nombre alfanumérico único que se caracteriza por ser fácil de recordar, utilizado para identificar un sitio en internet, ya sea servidor de correo electrónico o un servidor web.</p>
           <h3> Hosting:  </h3>
           <p> El hosting es un servicio al que puedes asociar tu dominio. Si tienes un dominio, lo más probable es que lo quieras para tener una página web, o para tener cuentas de correo bajo tu propio dominio..</p>
           <h3> Servidor:  </h3>
           <p> Un servidor web o servidor HTTP es un programa informático que procesa una aplicación del lado del servidor, realizando conexiones bidireccionales o unidireccionales y síncronas o asíncronas con el cliente y generando o cediendo una respuesta en cualquier lenguaje o Aplicación del lado del cliente.</p>
           <h3> Ups:  </h3>
           <p> es una fuente de suministro eléctrico que posee una batería con el fin de seguir dando energía a un dispositivo en el caso de interrupción eléctrica.</p>
           <h3> URL:   </h3>
           <p> es una secuencia de caracteres que se utiliza para nombrar y localizar recursos, documentos e imágenes en Internet.</p>
           <h3> Importar:   </h3>
           <p> traer de otra parte algo. La función Importar se utiliza para incorporar a una aplicación objetos, documentos u otro tipo de archivos que fueron creados en otra aplicación, o que pertenecen a versiones antiguas de la misma aplicación</p>
           <h3> <center> PRESENTACIÓN DEL SISTEMA DE INFORMACIÓN (SI) </center> </h3>
           <p> El Software Cyber Control es un sistema diseñado a medida para la empresa Cigarrería San Marcos, el cual pretende resolver la efectividad y seguridad que se deben llevar a cabo en los siguientes procesos: Inventarios de productos, Proveedores, Facturación, Registro de Clientes Mayoristas y Preferenciales, registro de Nuevos Usuarios.</p>
           <p> En el apartado de inventarios el usuario podrá verificar si se encuentra el producto en existencias, si esta por vencer o si no está registrado, también podrá modificar las características como: nombre, código, fecha de vencimiento, observaciones y eliminar definitivamente el producto.En el apartado de proveedores el usuario podrá verificar los datos del proveedor, empresa, así también como realizar pedidos y devoluciones.</p>
           <p> En el apartado de facturación el usuario podrá realizar una factura de venta o de devolución, para esto se deberá ingresar el número de identificación del cliente o empresa, el nombre completo del cliente o empresa, dirección y número de teléfono, así como también el código del producto, nombre, cantidad, valor unitario, con estos requisitos el usuario podrá generar la nueva factura.</p>
           <p> En el apartado de Registro de clientes Mayoristas y Preferenciales el usuario podrá: 1 Para clientes Mayoristas, obtener la información de las empresas que soliciten sus servicios de domicilio para mantener los registros de estas empresas y así hacer más efectivos estos procesos. 2Para clientes Preferenciales también se obtiene la información, pero en este caso es solo de personas las cuales llevan un registro de mucho tiempo de compras a esta empresa las cuales el gerente de la empresa destacara como Preferenciales. Para el apartado de registro de nuevos usuarios el gerente decide cuantos serán los equipos disponibles para que sus empleados puedan ingresar al sistema (en caso de ser necesario) y será él quien registre estos usuarios y también podrá modificarlos y eliminarlos en tal caso.</p>
           <h3> <center> ESPECIFICACIONES TÉCNICAS </center> </h3>
           <p> <h4>Descripción general</h4> 
              1.  Portátil o computador de mesa<br>
              2.  Mouse inalámbrico o alámbrico con entrada USB 
              3.  Tres dispositivos USB de 8 Gb respectivamente o disco duro externo particionado minimo320 GB. <br>
              4.  Cables HDMI para resolución de alta calidad en monitores externos.<br>
              5.  Manuales del equipo para el correcto uso del sistema de cómputo.<br>
              6.  Pád Mouse ergonómico para la estabilización del lector.<br>
              7.  Sistemas operativos Ubuntu Linux última versión y sistema operativo Windows 10 de 32 bits o 64 bits preferiblemente. <br>
              8.  Teclado ergonómico con capacidad de iluminación en ambientes nocturnos (Opcional).<br>

              <h4>Descripción de los componentes</h4>
              1.  Main Board con capacidad de procesador I3, I5, I7.<br>
              2.  Módulo de memoria RAM de capacidad superior a 2 Gigabytes.<br>
              <h4>Servidor de aplicaciones</h4>
              <p> El servidor de aplicaciones debe poseer una conexión estable a internet si el programa se usa a través de un dominio en la web el cual será el que permita el correcto funcionamiento del sistema, si el sistema se usa sin dominio en la web el servidor será el equipo donde se ejecute el sistema el cual debe poseer una conexión estable a la alimentación de corriente y una ups de respaldo en caso de fallas eléctricas. </p>
              <h4>Servidor de base de datos</h4>
              <p> Para el software Cyber Control se utiliza el servidor de base de datos que se encuentra en el hosting en caso de ser utilizado con la web, para el caso contrario el servidor de base de datos será PhpMyAdmin.   </p>
              <h4>Otras especificaciones</h4>
              <p> Para el uso del software en la web deberá recordar la dirección URL de Dominio con usuario y contraseña aquí el sistema funciona conectado de la manera correcta no se necesita ajustes extra, para el caso de uso sin conexión se requiere el funcionamiento a través del programa XAMMP el cual es un simulador de servidor y su servidor de base de datos será PhpMyAdmin el cual requiere ajustar la conexión de la base de datos si ya está creada para importarla y funcione el software correctamente.</p>
          <h3> <center> INSTALACIÓN DEL SISTEMA</center> </h3>
          <h4>Instalación por dominio </h4>
          <p> El software se plantea desde la comodidad de un dominio o u hosting gratuito inicialmente, esto a su vez requiere únicamente la entrada de la URL o especificación del subdominio para poder ingresar al mismo, de igual manera se plantea en una etapa inicial maneja un sub-dominio gratuito en los servidores de 000WebHosting ya que ofrecen una básica pero gratuita experiencia al respecto. Como dispone de elementos de construcción el software, tendremos que enfocar la instalación usando una base de datos MYSQL la cual debemos conectar al servidor de 000WEbHost, la cual nos da un usuario y una contraseña para ponerla en funcionamiento.</p>
          <P> El restante de la aplicación debe manejarse de la correcta forma en el editor de código ya que si existe una incongruencia con los términos de mayúsculas y minúsculas va a generar un error que muy probamente afecten la estética y el funcionamiento del mismo. Por último, se le alcanzara al cliente la URL seleccionada para poder ser usada en cualquier equipo de cómputo, cabe resaltar que el software no se encuentra en funcionamiento para equipos móviles, tabletas o plataformas táctiles con pantallas inferiores a 15 pulgadas. </P>
          <h4>Instalación por medio de un servidor local </h4>
          <p>De no contar con un servidor del dominio o hosting independiente, se puede instalar el software por medio de las herramientas SQL como XAMPP que por medio del sistema Phpmyadmin se puede administrar una base de datos sin problemas aparentes, de igual manera se adjunta la base de datos en el apartado de importación de bases de datos. </p>
          <h3> <center> ROLES Y/O USUARIOS </center> </h3>
          <h4>Rol de administrador:  </h4>
          <p> Posee todos los privilegios del sistema informático en cuestión, su rol principal es tener en cuenta todos los apartados relevantes de su empresa por medio del uso digital del software, este software está diseñado para un usuario administrador, es decir, todos los permisos de cambios y alteraciones del sistema se pueden hacer únicamente mediante estas cuentas de usuario.
<br> <b>Nota:</b> Esta versión de Cyber Control corresponde a la versión 10.0 y no está habilitada para ser operada por cargos inferiores al rol administrador.  
En correspondiente a lo anteriormente mencionado el usuario administrador gestiona las siguientes áreas (especificadas) del software informático. 
</p>
</p>
        </p>   
</div>

        </div>
        
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