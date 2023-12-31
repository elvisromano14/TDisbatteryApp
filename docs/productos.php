<?php
require_once "../modelos/productos.modelo.php";
require('fpdf_barcode.php');
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm
$pdf = new PDF_BARCODE('P','mm','A4');
$pdf->AddPage();
$respuestaProductos = ModeloProductos::mdlMostrarProductosQR();
	//set font to arial, bold, 14pt
	$pdf->SetFont('Arial','B',14);
	//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(130	,5,'Disbattery Lubricantes, S.A.',0,0);
	$pdf->Cell(59	,5,'J-41310543-8',0,1);//end of line
	//set font to arial, regular, 12pt
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(130	,5,'Calle 79 (Domingo Olavarria) Local Parcela 6-2 Zona Industrial Municipal Sur Valencia',0,0);
	$pdf->Cell(59	,5,'',0,1);//end of line
foreach ($respuestaProductos as $key => $value) {
	$code = $value["codigo"].'&'.$value["qrcode"].'&'.$value["fecha_inicio"].'&'.$value["fecha_vence"];
	// $pdf->EAN13(142,36, $code,5,0.35,9);
	//add qr code
	$pdf->Image("http://localhost:8000/proyectos/PHP/fpdf/qr_generator.php?code=".$code, 30, 20, 120, 120, "png");
	$pdf->SetFont('Arial','B',14);
	//Cell(width , height , text , border , end line , [align] )
	$pdf->Cell(130	,5,'Codigo',0,0);
	$pdf->Cell(59	,5,$value["codigo"],0,1);//end of line
	//set font to arial, regular, 12pt
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(130	,5,'Lote',0,0);
	$pdf->Cell(59	,5,$value["lote"],0,1);//end of line
}

// $pdf->Cell(130	,5,'[City, Country, ZIP]',0,0);
// $pdf->Cell(25	,5,'Date',0,0);
// $pdf->Cell(34	,5,'[dd/mm/yyyy]',0,1);//end of line

// $pdf->Cell(130	,5,'Phone [+12345678]',0,0);
// $pdf->Cell(25	,5,'Invoice #',0,0);
// $pdf->Cell(34	,5,'[1234567]',0,1);//end of line

// $pdf->Cell(130	,5,'Fax [+12345678]',0,0);
// $pdf->Cell(25	,5,'Customer ID',0,0);
// $pdf->Cell(34	,5,'[1234567]',0,1);//end of line

//make a dummy empty cell as a vertical spacer
// $pdf->Cell(189	,10,'',0,1);//end of line

// //billing address
// $pdf->Cell(100	,5,'Bill to',0,1);//end of line

// //add dummy cell at beginning of each line for indentation
// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,'[Name]',0,1);

// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,'[Company Name]',0,1);

// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,'[Address]',0,1);

// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,'[Phone]',0,1);

// //make a dummy empty cell as a vertical spacer
// $pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(130	,5,'Description',1,0);
// $pdf->Cell(25	,5,'Taxable',1,0);
// $pdf->Cell(34	,5,'Amount',1,1);//end of line
// $pdf->SetFont('Arial','',12);
// //Numbers are right-aligned so we give 'R' after new line parameter
// $pdf->Cell(130	,5,'UltraCool Fridge',1,0);
// $pdf->Cell(25	,5,'-',1,0);
// $pdf->Cell(34	,5,'3,250',1,1,'R');//end of line
// $pdf->Cell(130	,5,'Supaclean Diswasher',1,0);
// $pdf->Cell(25	,5,'-',1,0);
// $pdf->Cell(34	,5,'1,200',1,1,'R');//end of line
// $pdf->Cell(130	,5,'Something Else',1,0);
// $pdf->Cell(25	,5,'-',1,0);
// $pdf->Cell(34	,5,'1,000',1,1,'R');//end of line
$pdf->Output();