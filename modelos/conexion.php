<?php
class Conexion{
	static public function conectar(){
		// $link = new PDO('sqlite:bd/disbattery.db');
		return new PDO("sqlite:bd/disbattery.db","","",array(PDO::ATTR_PERSISTENT => true));
		return $link;
	}
}