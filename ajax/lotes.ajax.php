<?php
require_once "../modelos/productos.modelo.php";
	$codigo = $_POST['codigo'];
	$r = ModeloProductos::mdlMostrarLotesAjax($codigo);
	echo json_encode($r);