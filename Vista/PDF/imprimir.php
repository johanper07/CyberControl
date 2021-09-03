<?php
require 'fpdf/fpdf.php';
require '../../modelo/conexionDatos.php';

$pdf = new FPDF();
$pdf->AddPage(); //para agregar una nueva página

$pdf->SetFont('Arial','',14);



$pdf->Cell(0,10,'FORMATO DE FACTURA CYBER CONTROL',1,1,'C');

$pdf->Image('../Imagenes/Captura.gif',10,28,45,30,'GIF'); //x, y, ubicación anchura, altura
$pdf->Cell(45,40,'',0); //Recubre la imagen de forma Invisible 
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,40,'Desarrollado por los soportes informaticos de Cyber Control',0);

$pdf->SetFont('Arial','',10);
$pdf->Cell(45,10,'Fecha:'.date('d-m-Y').'',0);

$pdf->Ln(50);
//Para la tabla del Info. Cliente
$pdf->SetFont('Arial','B',11); //B=Negrilla 
$pdf->Cell(60,7,'Informacion Cliente',0);
$pdf->Cell(100,7,'',0);






$pdf->Ln(70);

$pdf->SetFont('Arial','B',11); //B=Negrilla, TAMAÑO
$pdf->Cell(70,7,'',0);
$pdf->Cell(100,7,'LISTADO DE PRODUCTOS',0);
$pdf->Ln(23);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,8,'',0);
$pdf->Cell(70,8,'prodcuto',0);
$pdf->Cell(72,8,'cantidad',0);
$pdf->Cell(40,8,'precio',0);
$pdf->Ln(7);
$pdf->SetFont('Arial','',9);

//Consulta en la base de datos

$query = "SELECT producto, cantidad, precio FROM factura";
$resultado = $conexion->query($query);

	while($fila = $resultado->fetch_assoc())
	{
        $pdf->Cell(10,8,'',0);
		$pdf->Cell(50,6,($fila['producto']),1,0,'L');
		$pdf->Cell(52,6,$fila['cantidad'],1,0,'L');
		$pdf->Cell(40,6,($fila['precio']),1,1,'L');
        

	}





$pdf->Output();

?>