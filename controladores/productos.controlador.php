<?php
class ControladorProductos{
	static public function ctrMostrarAlmacen(){
		$tabla = 'almacen';
		$respuesta = ModeloProductos::mdlMostrarAlmacen($tabla);
		return $respuesta;
	}
	static public function ctrMostrarCategoria(){
		$tabla = 'categoria';
		$respuesta = ModeloProductos::mdlMostrarCategoria($tabla);
		return $respuesta;
	}
	static public function ctrMostrarBrand(){
		$tabla = 'brand';
		$respuesta = ModeloProductos::mdlMostrarBrand($tabla);
		return $respuesta;
	}
	static public function ctrMostrarTipo(){
		$tabla = 'tipo';
		$respuesta = ModeloProductos::mdlMostrarTipo($tabla);
		return $respuesta;
	}
	static public function ctrMostrarUmbral(){
		$tabla = 'umbral';
		$respuesta = ModeloProductos::mdlMostrarUmbral($tabla);
		return $respuesta;
	}
	static public function ctrMostrarProductos(){
		$tabla = 'vw_productosxlotes';
		$respuesta = ModeloProductos::mdlMostrarProductos($tabla);
		return $respuesta;
	}
	static public function ctrMostrarProductosXLote(){
		$tabla = 'vw_productosxlotes';
		$respuesta = ModeloProductos::mdlMostrarProductosXLote($tabla);
		return $respuesta;
	}
	static public function ctrMostrarConteos(){
		$tabla = 'vw_conteos';
		$respuesta = ModeloProductos::mdlMostrarConteos($tabla);
		return $respuesta;
	}
	static public function ctrCrearProducto(){
		if(isset($_POST["nuevaCategoria2"])){		
			$stock = 0;	   
			$tabla = "productos";				
			$datos = array("id_categoria" => $_POST["nuevaCategoria2"],
			               "id_brand" => $_POST["nuevaPresentacion"],					               			               
				           	 "id_umbral" => $_POST["nuevoUmbral"],
				           	 "id_tipo" => $_POST["nuevoTipo"],
				           	 "codigo" => $_POST["nuevoCodigo"],
				           	 "descripcion" => $_POST["nuevaDescripcion"],
				           	 "stock" => $stock);
				$respuesta = ModeloProductos::mdlCrearProducto($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					    	$(function() {
					    		swal({
                    title: "¡El producto ha sido creado correctamente!",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: "btn btn-success"
                	}).then(function(result) {
						        if (result.value) {
						          window.location = "productos";
						        }
						  	})
						});
				</script>';
				}else{
					echo'<script>
					    	$(function() {
					    		swal({
                    title: "¡El producto no ha sido creado correctamente!",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: "btn btn-success"
                	}).then(function(result) {
						        if (result.value) {
						          window.location = "productos";
						        }
						  	})
						});
				</script>';
			}
		}
	}
}