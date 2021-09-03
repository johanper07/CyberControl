<?php
require 'fpdf/fpdf.php';
require '../../modelo/conexionDatos.php';

$pdf = new FPDF();
$pdf->AddPage(); //para agregar una nueva página

$pdf->SetFont('Arial','',14);



$pdf->Cell(0,10,'FORMATO DE INVENTARIO CYBER CONTROL',1,1,'C');

$pdf->Image('../Imagenes/Captura.jpg',10,28,45,30,'JPG'); //x, y, ubicación anchura, altura
$pdf->Cell(45,40,'',0); //Recubre la imagen de forma Invisible 
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,40,'Desarrollado por los soportes informaticos de Cyber Control',0);

$pdf->SetFont('Arial','',10);
$pdf->Cell(45,10,'Fecha:'.date('d-m-Y').'',0);







$pdf->Ln(40);

$pdf->SetFont('Arial','B',11); //B=Negrilla, TAMAÑO
$pdf->Cell(65,7,'',0);
$pdf->Cell(100,7,'LISTADO DE INVENTARIO VIGENTE ',0);
$pdf->Ln(23);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(22,8,'',0);
$pdf->Cell(48,8,'Producto',0);
$pdf->Cell(22,8,'Precio',0);
$pdf->Cell(38,8,'Cantidad',0);
$pdf->Cell(34,8,'descripcion',0);
$pdf->Cell(30,8,'Fecha Caducidad',0);
$pdf->Ln(7);
$pdf->SetFont('Arial','',9);

//Consulta en la base de datos

$query = "SELECT nombre, precio, stock,  descripcion , fechaVencimiento FROM producto";
$resultado = $conexion->query($query);

	while($fila = $resultado->fetch_assoc())
	{

		$pdf->Cell(65,6,($fila['nombre']),1,0,'L');
		$pdf->Cell(25,6,$fila['precio'],1,0,'L');
		$pdf->Cell(22,6,($fila['stock']),1,0,'L');
		$pdf->Cell(57,6,($fila['descripcion']),1,0,'L');
        $pdf->Cell(24,6,($fila['fechaVencimiento']),1,1,'L');
        

	}

$pdf->Ln(122);
$pdf->Cell(0,10,'FORMATO DE INVENTARIO CYBER CONTROL',1,1,'C');


$pdf->Output();

?>