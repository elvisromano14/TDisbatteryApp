<?php
require_once "../modelos/productos.modelo.php";
	$referencia = $_POST['referencia'];
	$tabla = 'view_productos';
	$r = ModeloProductos::mdlMostrarProductosAjax($referencia, $tabla);
	echo json_encode($r[0]);