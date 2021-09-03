<?php
require 'fpdf/fpdf.php';
require '../../modelo/conexionDatos.php';

$pdf = new FPDF();
$pdf->AddPage(); //para agregar una nueva página

$pdf->SetFont('Arial','',14);



$pdf->Cell(0,10,'FORMATO DE CLIENTES CYBER CONTROL',1,1,'C');

$pdf->Image('../Imagenes/Captura.jpg',10,28,45,30,'JPG'); //x, y, ubicación anchura, altura
$pdf->Cell(45,40,'',0); //Recubre la imagen de forma Invisible 
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,40,'Desarrollado por los soportes informaticos de Cyber Control',0);

$pdf->SetFont('Arial','',10);
$pdf->Cell(45,10,'Fecha:'.date('d-m-Y').'',0);







$pdf->Ln(40);

$pdf->SetFont('Arial','B',11); //B=Negrilla, TAMAÑO
$pdf->Cell(59,7,'',0);
$pdf->Cell(100,7,'LISTADO DE CLIENTES MAYORISTAS ',0);
$pdf->Ln(23);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(25,8,'Nombres',0);
$pdf->Cell(30,8,'Cedula',0);
$pdf->Cell(30,8,'Telefono',0);
$pdf->Cell(30,8,'Direccion',0);
$pdf->Cell(32,8,'Correo',0);
$pdf->Cell(30,8,'Comentarios',0);
$pdf->Ln(7);
$pdf->SetFont('Arial','',9);

//Consulta en la base de datos

$query = "SELECT nombre, cedula, telefono, direccion, correo , comentarios FROM clientesm";
$resultado = $conexion->query($query);

	while($fila = $resultado->fetch_assoc())
	{

		$pdf->Cell(23,6,($fila['nombre']),1,0,'L');
		$pdf->Cell(29,6,$fila['cedula'],1,0,'L');
		$pdf->Cell(27,6,($fila['telefono']),1,0,'L');
        $pdf->Cell(29,6,$fila['direccion'],1,0,'L');
		$pdf->Cell(39,6,($fila['correo']),1,0,'L');
        $pdf->Cell(44,6,($fila['comentarios']),1,1,'L');
        

	}

$pdf->Ln(122);
$pdf->Cell(0,10,'FORMATO DE CLIENTES CYBER CONTROL',1,1,'C');


$pdf->Output();

?>