<?php
require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";
// CONFIGURACIÓN PREVIA
require('fpdf.php');
//public $codigo;
$pdf = new FPDF('P','mm',array(210,295));
$pdf->AddPage();
// $pdf->Image('img/hk.jpg',8,6,30);
// $respuestaVenta = ControladorVentas::ctrMostrarVentaEncabeza($itemVenta, $valorVenta);
// $respuestaItemsVenta = ControladorVentas::ctrMostrarVentaDetalle($itemVenta, $valorVenta);
// CABECERA
$pdf->Ln(2);
// $pdf->SetFont('Helvetica','',14);
// $pdf->Cell(190,4,'HK Motors, C.A.',0,1,'R');
// $pdf->SetFont('Helvetica','',8);
// $pdf->Cell(190,4,'R.I.F.: J-41249563-1',0,1,'R');
// $pdf->Cell(190,4,'Calle Pena entre Escalona y Andres Bello Nro. 107-78 Local 4, 1',0,1,'R');
// $pdf->Cell(190,4,'Telefonos 0412.412.52.22 / 0424.406.32.36',0,1,'R');
$pdf->Ln(10);

//CLIENTE
$pdf->Cell(190,0,'','T');
$pdf->Ln(1);
$pdf->Cell(60,4,'Articulo: '.$respuestaVenta["documento"],0,1,'L');
$pdf->Cell(60,4,'Descripcion: '.$respuestaVenta["razon"],0,1,'L');
$pdf->Cell(60,4,'Lote: '.$respuestaVenta["direccion"],0,1,'L');
$pdf->Cell(60,4,'Cantidad: '.$respuestaVenta["direccion"],0,1,'L');
$pdf->Cell(60,4,'fecha_inicio: '.$respuestaVenta["telefono"],0,1,'L');
$pdf->Cell(60,4,'fecha_vence: '.$respuestaVenta["telefono"],0,1,'L');
$pdf->Cell(190,0,'','T');
// DATOS FACTURA  
$pdf->Ln(1);
// COLUMNAS

$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(40, 10, 'Articulo', 0);
$pdf->Cell(50, 10, 'Ud',0,0,'R');
$pdf->Cell(50, 10, 'Precio',0,0,'R');
$pdf->Cell(50, 10, 'Total',0,0,'R');
$pdf->Ln(8);
$pdf->Cell(190,0,'','T');
$pdf->Ln(0);
// PRODUCTOS
foreach ($respuestaItemsVenta as $key => $value) {
	$pdf->SetFont('Helvetica', '', 7);
	$pdf->MultiCell(80,5,$value["cod_producto"].' - '.$value["desc_producto"]); 
	$pdf->Cell(90, -5, $value["cantidad"],0,0,'R');
	$pdf->Cell(50, -5, number_format(round($value["prc_vta"],2), 2, ',', ' '),0,0,'R');
	$pdf->Cell(50, -5, number_format(round($value["cantidad"]*$value["prc_vta"],2), 2, ',', ' '),0,0,'R');
	$pdf->Ln(0);
}
// SUMATORIO DE LOS PRODUCTOS Y EL IVA
$pdf->SetFont('Helvetica', '', 8);
$pdf->Cell(190,0,'','T');
$pdf->Ln(3);    
$pdf->Cell(160, 10, 'TOTAL', 0,0,'R');    
$pdf->Cell(20, 10, '', 0);
$pdf->Cell(25, 10, number_format($respuestaVenta["mto_total"], 2, ',', ' '),0,0,'L');
 
// PIE DE PAGINA
$pdf->Ln(6);
$pdf->Cell($width_cell[0],4,'Fecha de garantia: '.$respuestaVenta["fecha_garantia"],0,0,'L',false);
$pdf->Ln(10);
$pdf->Cell(80,0,'Observaciones',0,1,'L');
$pdf->Ln(5);
$pdf->Cell(80,0,$respuestaVenta["observacion"],0,1,'L');
$pdf->Output('ticket.pdf','i');