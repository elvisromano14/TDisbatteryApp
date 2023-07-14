<?php
class ControladorConteos{
	static public function ctrMostrarConteos(){
		$tabla = 'vw_conteos';
		$respuesta = ModeloConteos::mdlMostrarConteos($tabla);
		return $respuesta;
	}
}