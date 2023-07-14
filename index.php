<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/conteos.controlador.php";
require_once "controladores/usuarios.controlador.php";

require_once "modelos/productos.modelo.php";
require_once "modelos/conteos.modelo.php";
require_once "modelos/usuarios.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();