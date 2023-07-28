<?php
require_once "../controladores/entregas.controlador.php";
require_once "../modelos/entregas.modelo.php";
require('fpdf.php');
AddPage();
$pdf->Image('img/icono-negro.png',8,6,30);
$itemEntrega = "codigo";
$valorEntrega = $_GET["codigo"];
$respuestaEntrega = ControladorEntregas::ctrMostrarEntregaEncabeza($itemEntrega, $valorEntrega);
$respuestaItemsEntrega = ControladorEntregas::ctrMostrarEntregaDetalle($itemEntrega, $valorEntrega);
// CABECERA
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(60,4,'Lacodigoteca.com',0,1,'C');
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(60,4,'C.I.F.: 01234567A',0,1,'C');
$pdf->Cell(60,4,'C/ Arturo Soria, 1',0,1,'C');
$pdf->Cell(60,4,'C.P.: 28028 Madrid (Madrid)',0,1,'C');
$pdf->Cell(60,4,'999 888 777',0,1,'C');
$pdf->Cell(60,4,'alfredo@lacodigoteca.com',0,1,'C');
 
// DATOS FACTURA        
$pdf->Ln(5);
$pdf->Cell(60,4,'R.I.F.: '.$respuestaEntrega["rif"],0,1,'');
$pdf->Cell(60,4,'Cliente: '.$respuestaEntrega["nombre"],0,1,'');
$pdf->Cell(60,4,'Direccion: '.$respuestaEntrega["direccion"],0,1,);
$pdf->Cell(60,4,'Telefono: '.$respuestaEntrega["telefono"],0,1,'');
$pdf->Cell(60,4,'Direccion: '.$respuestaEntrega["fecha"],0,1,);
$pdf->Cell(60,4,'Nota Entrega: '.$respuestaVenta["codigo"],0,1,'');
 
// COLUMNAS
$pdf->SetFont('Helvetica', 'B', 6);
$pdf->Cell(30, 10, 'Articulo', 0);
$pdf->Cell(5, 10, 'Ud',0,0,'R');
$pdf->Cell(10, 10, 'Precio',0,0,'R');
$pdf->Cell(15, 10, 'Total',0,0,'R');
$pdf->Ln(8);
$pdf->Cell(60,0,'','T');
$pdf->Ln(0);
 
// PRODUCTOS
foreach ($respuestaItemsVenta as $key => $value) {
	$pdf->SetFont('Helvetica', '', 6);
	$pdf->MultiCell(30,4,$value["cod_producto"].' - '.$value["desc_producto"],0,'L'); 
	$pdf->Cell(30, -5, $value["cantidad"],0,0,'R');
	$pdf->Cell(10, -5, number_format(round($value["precio_usd"],2), 2, ',', ' '),0,0,'R');
	$pdf->Cell(15, -5, number_format(round($value["cantidad"]*$value["precio_usd"],2), 2, ',', ' '),0,0,'R');
	$pdf->Ln(2);
}
 
// SUMATORIO DE LOS PRODUCTOS Y EL IVA
$pdf->Ln(6);
$pdf->Cell(60,0,'','T');
$pdf->Ln(2);    
$pdf->Cell(25, 10, 'SUBTOTAL', 0);    
$pdf->Cell(20, 10, '', 0);
$pdf->Cell(15, 10, number_format($respuestaVenta["total"], 2, ',', ' '),0,0,'R');
$pdf->Ln(3);    
$pdf->Cell(25, 10, 'TOTAL', 0);    
$pdf->Cell(20, 10, '', 0);
$pdf->Cell(15, 10, number_format($respuestaVenta["total"], 2, ',', ' '),0,0,'R');
 
// PIE DE PAGINA
$pdf->Ln(10);
$pdf->Cell(60,0,'OBSERVACIONES',0,1,'C');
$pdf->Ln(3);
$pdf->Cell(60,0,$respuestaVenta["observacion"],0,1,'C');
 
$pdf->Output('ticket.pdf','i');
?>