<?php
require_once "../modelos/productos.modelo.php";
require_once "../modelos/conteos.modelo.php";

	$fecha = $_POST["fecha"];
	$traerCodConteo = ModeloConteos::mdlMostrarCodConteo();
	if (empty($traerCodConteo)) {
		$id = 1;
	}else{
		$id = $traerCodConteo["id"] + $_POST["id"];
	}
	$estatus = 0;
	$listaProductos = $_POST["listaProductos"];
	$tablaProductosXLotes = "prdxlotes";
	$tabla = "productos";
	$tablaConteos = "conteos";
	foreach ($listaProductos as $key => $value) {
		if ($value[1] == 'FULGOR') {
			$almacen = '000002';
		}
		if ($value[1] == 'PRINCIPAL') {
			$almacen = '000001';
		}
		if ($value[1] == 'NO APTO PARA LA VENTA FULGOR') {
			$almacen = '000003';
		}
		if ($value[1] == 'NO APTO PARA LA VENTA') {
			$almacen = '000004';
		}
		if ($value[1] == 'GASTOS ADMINISTRATIVOS') {
			$almacen = '000005';
		}
		if ($value[1] == 'GLABORATORIO') {
			$almacen = '000006';
		}
		if ($value[1] == 'EQUIPOS DE PLANTA') {
			$almacen = '000007';
		}
		if ($value[1] == 'ACTIVO FIJO') {
			$almacen = '000008';
		}
		if ($value[1] == 'VENEZOLANA DE SPRAY') {
			$almacen = '000009';
		}
		$codigo = $value[3];
		$lote = $value[2];
		$fecha = $value[10];
		$cantidad = $value[9];
		$actualizarProductosXLotes = ModeloProductos::mdlActualizarProductosXLotes($tablaProductosXLotes,$codigo,$almacen,$lote,$fecha,$cantidad);
		$tablaConteo = "conteos";
		$datosConteos = array("id"=>$id,"almacen"=>$value[1],"lote"=>$value[2],"codigo"=>$value[3],"descripcion"=>$value[4],"undmed"=>$value[5],"unidades"=>$value[6],"cantidades"=>$value[7],"sobrantes"=>$value[8],"total"=>$value[9],"fecha_lote"=>$value[10],"fecha"=>$fecha,"estatus"=>$estatus);
	$respuestaConteos = ModeloConteos::mdlCrearConteo($tablaConteos, $datosConteos);
	}
	$traerConteo = ModeloConteos::mdlMostrarConteo($tablaConteo, $id);
	$traerProductos = ModeloProductos::mdlMostrarProductos($tabla);
	foreach ($traerConteos as $key => $value) {
		$codigo = $value["codigo"];
		$cantidad = $value["stock"];
		$actualizarProductos = ModeloProductos::mdlActualizarProductos($tabla,$codigo,$cantidad);
	}

	echo "ok";