<?php
require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";
// CONFIGURACIÓN PREVIA
require('fpdf.php');
//public $codigo;
$pdf = new FPDF('P','mm',array(58,160));
$pdf->AddPage();
$itemVenta = "codigo";
$valorVenta = $_GET["codigo"];
$respuestaVenta = ControladorVentas::ctrMostrarVentaEncabeza($itemVenta, $valorVenta);
$respuestaItemsVenta = ControladorVentas::ctrMostrarVentaDetalle($itemVenta, $valorVenta);
// CABECERA
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(40,4,'SENIAT',0,1,'C');
$pdf->Cell(40,4,'HK Motors, C.A.',0,1,'C');
$pdf->SetFont('Helvetica','',6);
$pdf->Cell(40,4,'R.I.F.: J-41249563-1',0,1,'C');
$pdf->Cell(40,4,'Calle Peña entre Escalona y Andres Bello',0,1,'C');
$pdf->Cell(40,4,'Nº 107-78, Local 4 Valencia Edo Carabobo',0,1,'C');
$pdf->Cell(40,4,'0424.405.32.36 / 0412.412.52.22',0,1,'C');
$pdf->Ln(2);

//CLIENTE
$pdf->Cell(40,4,'R.I.F.: '.$respuestaVenta["rif"],0,1,'L');
$pdf->Cell(40,4,'Razon: '.$respuestaVenta["nombre"],0,1,'L');
$pdf->Cell(40,4,'Fecha: '.$respuestaVenta["fecha"],0,1,'L');
$pdf->Cell(40,4,'Factura: FAC000'.$respuestaVenta["codigo"],0,1,'L');
$pdf->Ln(2);
// DATOS FACTURA  
 
// COLUMNAS

$pdf->Cell(40,0,'','T');
$pdf->Ln(0);

// PRODUCTOS
foreach ($respuestaItemsVenta as $key => $value) {
	$pdf->SetFont('Helvetica', '', 5);
	$pdf->Cell(20,5,$value["desc_producto"]);
	$pdf->Ln(8);
	//$pdf->Cell(20, 5,$value["desc_producto"]); 
	$pdf->Cell(35, -5, $value["cantidad"] .' X '.number_format($value["precio_usd"], 2, ',', ' '),0,0,'R');
	//$pdf->Cell(20, 10, number_format(round($value["precio"]), 2, ',', ' '),0,0,'R');
	// $pdf->Cell(10, -5, number_format(round($value["cantidad"]*($value["precio_usd"]*$value["tasa"])), 2, ',', ' '),0,0,'R');
	$pdf->Ln(0);
}
// SUMATORIO DE LOS PRODUCTOS Y EL IVA
$pdf->Ln(6);
$pdf->Cell(40,0,'','T');
$pdf->Ln(2);    
$pdf->Cell(15, 10, 'SUBTOTAL', 0);    
$pdf->Cell(10, 10, '', 0);
$pdf->Cell(12, 10, number_format($respuestaVenta["monto"], 2, ',', ' '),0,0,'R');
$pdf->Ln(3);    
$pdf->Cell(15, 10, 'I.V.A. 16%', 0);    
$pdf->Cell(10, 10, '', 0);
$pdf->Cell(12, 10, '0,00', 0);
$pdf->Ln(3);    
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(15, 12, 'TOTAL', 0);  
$pdf->Ln(2);  
//$pdf->Cell(20, 10, '', 0);
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(40, 15,'Bs  '. number_format($respuestaVenta["monto"], 2, ',', ' '),0,0,'R');
$pdf->Ln(2);
// PIE DE PAGINA
$pdf->Ln(10);
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(40,0,'OBSERVACIONES',0,1,'L');
$pdf->Ln(3);
$pdf->Cell(40,0,$respuestaVenta["observacion"],0,1,'L');
$pdf->Output('ticket.pdf','i');