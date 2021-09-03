<?php
require "../modelo/ConexionDatos.php";
if (!isset($_SESSION['user']))
	header("location:index.php?x=2");	
	
extract ($_REQUEST);
if (!isset($_REQUEST['x']))
	$_REQUEST['x']=0;

$objConexion=Conectarse();

$sql="select idMedico, medIdentificacion,medNombres,medApellidos,medEspecialidad,medTelefono,medCorreo

from medicos";

$resultado = $objConexion->query($sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista De Medicos:)</title>
</head>

<body>
<center>
<h1 align="center"> LISTA DE MEDICOS</h1>
<table width="80%" border="2" align="center">
  <tr align="center" bgcolor="#229954">
    <td width="18%">Identificacion</td>
    <td width="20%">Nombres</td>
     <td width="20%">Apellidos</td>
    <td width="19%">Especialidad</td>
    <td width="15%">Telefono</td>
    <td width="15%">Correo</td>
    <td width="7%">Editar</td>
    <td width="10%">Eliminar</td>
  </tr></center> 
  
  <?php

  while ($empleado = $resultado->fetch_object())
  {
	?>
	<tr bgcolor="#D0ECE7  ">
        <td> <?php  echo $empleado->medIdentificacion ?></td>
        <td> <?php  echo $empleado->medNombres ?> </td>
        <td><?php  echo $empleado->medApellidos ?></td>
        <td><?php  echo $empleado->medEspecialidad ?></td>
        <td><?php  echo $empleado->medTelefono ?></td>
        <td><?php  echo $empleado->medCorreo ?></td>
        
          <td align="center"><a href="frmActualizarrEmpleado.php?idMedico=<?php echo $empleado->idMedico?>"><img src="../Imagenes/editar.jpg" 
        
        width="29" height="24" /></a></td>
        
        
        <td align="center"><a href="eliminarEmpleado.php?idMedico=<?php echo $empleado->idMedico?>"><img src="../Imagenes/eliminar.png" 
        
        width="29" height="24" /></a></td>
    </tr>
  <?php
  }
  ?> 
</table>
<p>
<?php
if ($_REQUEST['x']==1)
	echo "Se ha actualizado el Medico correctamente";
if ($_REQUEST['x']==2)
	echo "Problemas al actualizar el MEDICOS";	
if ($_REQUEST['x']==3)
	echo "Se ha eliminado el Medico correctamente";
if ($_REQUEST['x']==4)
	echo "Problemas al eliminar el Medico";

?>
</body>
</html>