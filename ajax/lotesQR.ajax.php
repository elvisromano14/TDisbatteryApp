<?php
require_once "../modelos/productos.modelo.php";
	$almacen = $_POST['almacen'];
	$lote = $_POST['lote'];
	$codigo = $_POST['codigo'];
	$fecha = $_POST['fecha'];
	$tabla = 'vw_productosxlotes';
	$r = ModeloProductos::mdlMostrarLotesAjaxQR($tabla,$almacen,$lote,$codigo,$fecha);
	echo json_encode($r);