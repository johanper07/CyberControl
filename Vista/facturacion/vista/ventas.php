
<?php
session_start();
if(($_SESSION["codigo"]) !=''){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CYBER CONTROL</title>
        <link rel="stylesheet"  href="../../CSS/estiloVentas.css">
    </head>
    <body>
        
        <header>
        Historial de Facturas
        </header>
        
        <a href="../../Interfaz_1.PHP"> <img src="../../imagenes/Captura.png" class="inicio"></a>
              <br><br><br>
        
                 <a href="../../PDF/reporteRegistrosFactura.php"><input type="submit" name="button" id="button" value="Generar Reporte" ></a>
        <br><br><br>
        

        
        
        <?php
        require_once "../model/Data.php";

        $d = new Data();

        $ventas = $d->getVentas();

        echo "<h1>Listado de ventas</h1>";

        echo "<table border='0'>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Fecha</th>";
                echo "<th>Total</th>";
                echo "<th>Detalle</th>";
            echo "<tr>";

        foreach ($ventas as $v) {
            echo "<tr>";
                echo "<td>".$v->id."</td>";
                echo "<td>".$v->fecha."</td>";
                echo "<td>$".$v->total."</td>";
                echo "<td>";
                    echo "<a href='detalle.php?id=".$v->id."'>Ver detalle</a>";
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
<a href='../index.php'><img src="../../Imagenes/back.png"> <br>Volver</a>
        
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
 