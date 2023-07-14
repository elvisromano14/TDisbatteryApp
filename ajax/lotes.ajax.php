<?php
require_once "../modelos/productos.modelo.php";
	$codigo = $_POST['codigo'];
	$tabla = 'vw_productosxlotes';
	$r = ModeloProductos::mdlMostrarLotesAjax($codigo, $tabla);
	echo json_encode($r);