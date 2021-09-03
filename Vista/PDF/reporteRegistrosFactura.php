<?php
require 'fpdf/fpdf.php';
require '../../modelo/conexionDatos.php';

$pdf = new FPDF();
$pdf->AddPage(); //para agregar una nueva página

$pdf->SetFont('Arial','',14);



$pdf->Cell(0,10,'FORMATO DE FACTURA CYBER CONTROL',1,1,'C');

$pdf->Image('../Imagenes/Captura.jpg',10,28,45,30,'JPG'); //x, y, ubicación anchura, altura
$pdf->Cell(45,40,'',0); //Recubre la imagen de forma Invisible 
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,40,'Desarrollado por los soportes informaticos de Cyber Control',0);

$pdf->SetFont('Arial','',10);
$pdf->Cell(45,10,'Fecha:'.date('d-m-Y').'',0);







$pdf->Ln(40);

$pdf->SetFont('Arial','B',11); //B=Negrilla, TAMAÑO
$pdf->Cell(58,7,'',0);
$pdf->Cell(100,7,'LISTADO DE REGISTROS DE FACTURAS ',0);
$pdf->Ln(23);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(58,8,'',0);
$pdf->Cell(20,8,'Id',0);
$pdf->Cell(35,8,'Fecha y Hora',0);
$pdf->Cell(38,8,'Total Factura',0);

$pdf->Ln(7);
$pdf->SetFont('Arial','',9);

//Consulta en la base de datos

$query = "SELECT id, fecha, total FROM venta";
$resultado = $conexion->query($query);

	while($fila = $resultado->fetch_assoc())
	{
        $pdf->Cell(47,7,'',0);
		$pdf->Cell(25,6,($fila['id']),1,0,'L');
		$pdf->Cell(35,6,$fila['fecha'],1,0,'L');
		$pdf->Cell(35,6,($fila['total']),1,1,'L');;
        

	}

$pdf->Ln(122);
$pdf->Cell(0,10,'FORMATO DE FACTURA CYBER CONTROL',1,1,'C');


$pdf->Output();

?>