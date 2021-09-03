<?php
require 'fpdf/fpdf.php';
require '../../modelo/conexionDatos.php';

$pdf = new FPDF();
$pdf->AddPage(); //para agregar una nueva página

$pdf->SetFont('Arial','',14);



$pdf->Cell(0,10,'FORMATO DE PROVEEDORES CYBER CONTROL',1,1,'C');

$pdf->Image('../Imagenes/Captura.jpg',10,28,45,30,'JPG'); //x, y, ubicación anchura, altura
$pdf->Cell(45,40,'',0); //Recubre la imagen de forma Invisible 
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,40,'Desarrollado por los soportes informaticos de Cyber Control',0);

$pdf->SetFont('Arial','',10);
$pdf->Cell(45,10,'Fecha:'.date('d-m-Y').'',0);







$pdf->Ln(40);

$pdf->SetFont('Arial','B',11); //B=Negrilla, TAMAÑO
$pdf->Cell(70,7,'',0);
$pdf->Cell(100,7,'LISTADO DE PROVEEDORES ',0);
$pdf->Ln(23);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(20,8,'Nombres',0);
$pdf->Cell(37,8,'Telefono',0);
$pdf->Cell(30,8,'Direccion',0);
$pdf->Cell(30,8,'Correo',0);
$pdf->Cell(32,8,'Empresa',0);
$pdf->Cell(30,8,'Comentarios',0);
$pdf->Ln(7);
$pdf->SetFont('Arial','',9);

//Consulta en la base de datos

$query = "SELECT nombres, telefono, direccion, correo, empresa , comentarios FROM proveedores";
$resultado = $conexion->query($query);

	while($fila = $resultado->fetch_assoc())
	{

		$pdf->Cell(20,6,($fila['nombres']),1,0,'L');
		$pdf->Cell(27,6,$fila['telefono'],1,0,'L');
		$pdf->Cell(30,6,($fila['direccion']),1,0,'L');
        $pdf->Cell(38,6,$fila['correo'],1,0,'L');
		$pdf->Cell(35,6,($fila['empresa']),1,0,'L');
        $pdf->Cell(42,6,($fila['comentarios']),1,1,'L');
        

	}

$pdf->Ln(122);
$pdf->Cell(0,10,'FORMATO DE PROVEEDORES CYBER CONTROL',1,1,'C');


$pdf->Output();

?>