<?php
require_once "conexion.php";
class ModeloProductos{
	static public function mdlMostrarAlmacen($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarCategoria($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarBrand($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarTipo($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarUmbral($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarProductos($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY codigo ASC");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarProductosXLote($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarProductosAjax($referencia, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE lote = $referencia");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarLotesAjax($codigo, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo = $codigo");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarLotesAjaxQR($tabla,$almacen,$lote,$codigo,$fecha){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo = '$codigo' AND almacen = '$almacen' AND lote = '$lote' AND fecha_lote = '$fecha'");
		$stmt -> execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	static public function mdlActualizarProductos($tablaProductos,$codigo,$cantidad){
		$stmt = Conexion::conectar()->prepare("UPDATE $tablaProductos SET stock = $cantidad WHERE codigo = '$codigo'");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
	}
	static public function mdlActualizarProductosXLotes($tablaProductosXLotes,$codigo,$almacen,$lote,$fecha,$cantidad){
		$stmt = Conexion::conectar()->prepare("UPDATE $tablaProductosXLotes SET stock = $cantidad WHERE lote = '$lote' AND codigo = '$codigo' AND fecha = '$fecha' AND cod_almacen = '$almacen'");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
	}
	static public function mdlCrearProducto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_categoria, id_brand, id_umbral, id_tipo, codigo, descripcion, stock) VALUES (:id_categoria, :id_brand, :id_umbral, :id_tipo, :codigo, :descripcion, :stock)");
		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":id_brand", $datos["id_brand"], PDO::PARAM_INT);
		$stmt->bindParam(":id_umbral", $datos["id_umbral"], PDO::PARAM_INT);
		$stmt->bindParam(":id_tipo", $datos["id_tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);	
		if($stmt->execute()){
			return "ok";	
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
}