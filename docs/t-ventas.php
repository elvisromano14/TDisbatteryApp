<?php
require_once "../modelos/productos.modelo.php";
// CONFIGURACIÓN PREVIA
require('fpdf.php');
//public $codigo;
$pdf = new FPDF('P','mm',array(210,295));
$pdf->AddPage();
$respuestaProductos = ModeloProductos::mdlMostrarProductosQR();
foreach ($respuestaProductos as $key => $value) {
	$pdf->Ln(2);
	$pdf->SetFont('Helvetica','',14);
	$pdf->Image('img/white.jpg',10,1,50);
	$pdf->Cell(190,4,'Disbattery Lubricantes, S.A.',0,1,'R');
	$pdf->SetFont('Helvetica','',8);
	$pdf->Cell(190,4,'R.I.F.: J-41310543-8',0,1,'R');
	$pdf->Cell(190,4,'Calle 79 (Domingo Olavarria) Local Parcela 6-2 Zona Industrial Municipal Sur Valencia',0,1,'R');
	$pdf->Cell(190,4,'Telefonos 0412.412.52.22 / 0424.406.32.36',0,1,'R');
	$pdf->Ln(10);
	$pdf->SetFont('Helvetica','',12);
	$code = $value["codigo"];
	$pdf->Cell(190,0,'','T');
	$pdf->Ln(3);
	$pdf->Cell(60,4,'Articulo: '.$value["codigo"],0,1,'L');
	$pdf->Cell(60,4,'Descripcion: '.$value["descripcion"],0,1,'L');
	$pdf->Cell(60,4,'Lote: '.$value["lote"],0,1,'L');
	$pdf->Cell(60,4,'Cantidad: '.$value["stock"],0,1,'L');
	$pdf->Cell(60,4,'fecha_inicio: '.$value["fecha_inicio"],0,1,'L');
	$pdf->Cell(60,4,'fecha_vence: '.$value["fecha_vence"],0,1,'L');
	$pdf->Cell(190,0,'','T');
	$pdf->Ln(3);
}

// DATOS FACTURA  
// COLUMNAS
// $pdf->SetFont('Helvetica', 'B', 7);
// $pdf->Cell(40, 10, 'Articulo', 0);
// $pdf->Cell(50, 10, 'Ud',0,0,'R');
// $pdf->Cell(50, 10, 'Precio',0,0,'R');
// $pdf->Cell(50, 10, 'Total',0,0,'R');
// $pdf->Ln(8);
// $pdf->Cell(190,0,'','T');
// $pdf->Ln(0);
// PRODUCTOS
// foreach ($respuestaItemsVenta as $key => $value) {
// 	$pdf->SetFont('Helvetica', '', 7);
// 	$pdf->MultiCell(80,5,$value["cod_producto"].' - '.$value["desc_producto"]); 
// 	$pdf->Cell(90, -5, $value["cantidad"],0,0,'R');
// 	$pdf->Cell(50, -5, number_format(round($value["prc_vta"],2), 2, ',', ' '),0,0,'R');
// 	$pdf->Cell(50, -5, number_format(round($value["cantidad"]*$value["prc_vta"],2), 2, ',', ' '),0,0,'R');
// 	$pdf->Ln(0);
// }
// SUMATORIO DE LOS PRODUCTOS Y EL IVA
// $pdf->SetFont('Helvetica', '', 8);
// $pdf->Cell(190,0,'','T');
// $pdf->Ln(3);    
// $pdf->Cell(160, 10, 'TOTAL', 0,0,'R');    
// $pdf->Cell(20, 10, '', 0);
// $pdf->Cell(25, 10, number_format($respuestaVenta["mto_total"], 2, ',', ' '),0,0,'L');
 
// PIE DE PAGINA
// $pdf->Ln(6);
// $pdf->Cell($width_cell[0],4,'Fecha de garantia: '.$respuestaVenta["fecha_garantia"],0,0,'L',false);
// $pdf->Ln(10);
// $pdf->Cell(80,0,'Observaciones',0,1,'L');
// $pdf->Ln(5);
// $pdf->Cell(80,0,$respuestaVenta["observacion"],0,1,'L');
$pdf->Output();