<?php
require_once "conexion.php";
class ModeloConteos{
	static public function mdlMostrarCodConteo(){
		$stmt = Conexion::conectar()->prepare("SELECT id FROM conteos ORDER BY id desc LIMIT 1");
		$stmt -> execute();
		return $stmt -> fetch(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarConteos($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlMostrarConteo($tablaConteo,$id){
		$stmt = Conexion::conectar()->prepare("SELECT codigo,SUM(total) AS stock FROM $tablaConteos WHERE id = $id GROUP BY codigo");
		$stmt -> execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function mdlCrearConteo($tablaConteos, $datosConteos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tablaConteos(id,almacen,lote,codigo,descripcion,undmed,unidades,cantidades,sobrantes,total,fecha_lote,fecha,estatus) VALUES (:id,:almacen,:lote,:codigo,:descripcion,:undmed,:unidades,:cantidades,:sobrantes,:total,:fecha_lote,:fecha,:estatus) ");
		$stmt->bindParam(":id", $datosConteos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":almacen", $datosConteos["almacen"], PDO::PARAM_STR);
		$stmt->bindParam(":lote", $datosConteos["lote"], PDO::PARAM_STR);		
		$stmt->bindParam(":codigo", $datosConteos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosConteos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":undmed", $datosConteos["undmed"], PDO::PARAM_STR);
		$stmt->bindParam(":unidades", $datosConteos["unidades"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidades", $datosConteos["cantidades"], PDO::PARAM_STR);
		$stmt->bindParam(":sobrantes", $datosConteos["sobrantes"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datosConteos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosConteos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_lote", $datosConteos["fecha_lote"], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $datosConteos["estatus"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
	}

}