

<?php 
ob_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> CYBER CONTROL</title>
        <link rel="stylesheet"  href="../CSS/estiloFacturasxd.css">
    </head>
    <body>
        
        <header>
        Facturación
        </header>
        <article>
        <a href="../Interfaz_1.PHP"> <img src="../Imagenes/Captura.PNG" class="inicio"></a></article>
        <br><br><br>
        <div class="container">

            <div class="contenedor">
        
        <h1><center>Listado de Productos</h1>
              
            <td><a href="vista/ventas.php"> <img src="../Imagenes/checklist.png"> <br> Listado de ventas </center></a></td>
        <table border='0'>
              
            
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencias</th>
                <th>Añadir a venta</th>
            </tr>

            <?php
            require_once "model/Data.php";

            $d = new Data();

            $productos = $d->getProductos();

            foreach ($productos as $p) {
                echo "<tr>";
                    echo "<td>".$p->id."</td>";
                    echo "<td>".$p->nombre."</td>";
                    echo "<td>$".$p->precio."</td>";
                    echo "<td>".$p->stock."</td>";
                    echo "<td>";
                        echo "<form action='controller/agregar.php' method='post'>";
                            echo "<input type='hidden' name='txtId' value='".$p->id."'>";
                            echo "<input type='hidden' name='txtNombre' value='".$p->nombre."'>";
                            echo "<input type='hidden' name='txtPrecio' value='".$p->precio."'>";
                            echo "<input type='hidden' name='txtStock' value='".$p->stock."'>";
                            echo "<input type='number' name='txtCantidad' required='required'>";
                            echo "<input type='submit' name='btnAnadir' value='Añadir'>";
                        echo "</form>";
                    echo "</td>";
                echo "</tr>";
            }
            ?>
            
        </table>

        

        <?php
        if(isset($_GET["m"])){
            $m = $_GET["m"];

            switch($m){
                case "1":
                    echo'<script>alert("EL producto no tiene el número de existencias seleccionadas en Inventario");
                          window.history.go(-1);
                          </script>';
                    break;
                case "2":
                    echo'<script>alert("La cantidad debe ser un número positivo");
                          window.history.go(-1);
                          </script>';
                    break;
            }
        }
        ?>
</div>
</div>
<br>
        <?php
         
  session_start();

        if(isset($_SESSION["carrito"])){
            $carrito = $_SESSION["carrito"];


            echo "<center><h1>Listado de compra</center></h1>";
            echo "<br>";
            echo "<table border='1'>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Precio</th>";
                    echo "<th>Stock actual</th>";
                    echo "<th>Cantidad</th>";
                    echo "<th>SubTotal</th>";
                    echo "<th>Eliminar</th>";
                echo "<tr>";

                $total = 0;
                $i = 0;
                foreach ($carrito as $p) {
                    echo "<tr>";
                        echo "<td>".$p->id."</td>";
                        echo "<td>".$p->nombre."</td>";
                        echo "<td>$".$p->precio."</td>";
                        echo "<td>".$p->stock."</td>";
                        echo "<td>".$p->cantidad."</td>";
                        echo "<td>$".$p->subTotal."</td>";
                        echo "<td>";
                            echo "<a href='controller/eliminarProCar.php?in=$i'>Eliminar</a>";
                        echo "</td>";
                        $total += $p->subTotal;
                        $i++;
                    echo "</tr>";
                }
                echo "<tr>";
                    echo "<td colspan='5'><b>Total:</b></td>";
                    echo "<td colspan='2'><b>$$total</b></td>";
                    $_SESSION["total"] = $total;
                echo "</tr>";

                echo "<tr>";
                    echo "<td colspan='7'>";
                        echo "<form action='controller/generarVenta.php' method='post'>";
                        echo "<br>";

                            echo "<input type='submit' value='Realizar venta'>";
                        echo "</form>";
                    echo "</td>";
                echo "</tr>";
            echo "</table>";

            //echo "Cantidad de objetos: ".count($carrito);
            ob_end_flush();

    
        }
        ?>
        <br>
        

                         
        
    </body>
</html>
