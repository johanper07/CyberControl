<?php
require 'fpdf/fpdf.php';
require '../../modelo/conexionDatos.php';

$pdf = new FPDF();
$pdf->AddPage(); //para agregar una nueva página

$pdf->SetFont('Arial','',14);



$pdf->Cell(0,10,'FORMATO DE CONTROL DE USUARIOS CYBER CONTROL',1,1,'C');

$pdf->Image('../Imagenes/Captura.jpg',10,28,45,30,'JPG'); //x, y, ubicación anchura, altura
$pdf->Cell(45,40,'',0); //Recubre la imagen de forma Invisible 
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,40,'Desarrollado por los soportes informaticos de Cyber Control',0);

$pdf->SetFont('Arial','',10);
$pdf->Cell(45,10,'Fecha:'.date('d-m-Y').'',0);







$pdf->Ln(40);

$pdf->SetFont('Arial','B',11); //B=Negrilla, TAMAÑO
$pdf->Cell(57,7,'',0);
$pdf->Cell(100,7,'LISTADO DE CONTROL DE USUARIOS ',0);
$pdf->Ln(23);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,8,'',0);
$pdf->Cell(27,8,'Nombres',0);
$pdf->Cell(40,8,'Apellidos',0);
$pdf->Cell(18,8,'Correo',0);
$pdf->Cell(39,8,'Fecha Nacimiento',0);
$pdf->Cell(23,8,'usuario',0);
$pdf->Cell(2,8,'Clave',0);
$pdf->Ln(7);
$pdf->SetFont('Arial','',9);

//Consulta en la base de datos

$query = "SELECT nombres, apellidos, correo,  fechaNacimiento , usuario, clave FROM usuarios";
$resultado = $conexion->query($query);

	while($fila = $resultado->fetch_assoc())
	{

		$pdf->Cell(33,6,($fila['nombres']),1,0,'L');
		$pdf->Cell(33,6,$fila['apellidos'],1,0,'L');
		$pdf->Cell(38,6,($fila['correo']),1,0,'L');
		$pdf->Cell(19,6,($fila['fechaNacimiento']),1,0,'L');
        $pdf->Cell(29,6,($fila['usuario']),1,0,'L');
        $pdf->Cell(28,6,($fila['clave']),1,1,'L');
        

	}

$pdf->Ln(122);
$pdf->Cell(0,10,'FORMATO DE CONTROL DE USUARIOS CYBER CONTROL',1,1,'C');


$pdf->Output();

?>