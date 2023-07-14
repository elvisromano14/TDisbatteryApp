<?php
class ControladorUsuarios{
	static public function ctrIngresoUsuario(){		
		if(isset($_POST["ingUsuario"])){
		  $encriptar = $_POST["ingPassword"];
			$tabla = "usuarios";
			$item = "usuario";
			$valor = $_POST["ingUsuario"];
			$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
			if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){
				if($respuesta["estatus"] == 1){
					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["empleado"] = $respuesta["nombre"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["perfil"] = $respuesta["perfil"];
					echo '<script>window.location = "productos";</script>';										
				}else{
					echo '<br>
						<div class="alert alert-danger">El usuario aún no está activado</div>';
				}
			}else{
				echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
			}
		}
	}
}