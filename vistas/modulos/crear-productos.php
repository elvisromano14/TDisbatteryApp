<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="page-header">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<div class="title">
						<h4>Inventario</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="inicio">Inicio</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Lista de productos
							</li>
						</ol>
					</nav>
				</div>
        <div class="col-md-4 col-sm-12 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".agregarProductosM"><i class="icon-copy fa fa-plus-square" aria-hidden="true"></i> Agregar Productos</button>
        </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="card-box mb-30">
					<div class="pb-20">
						<table id="datatable6" class="table hover data-table-export table-bordered">
							<thead>
								<tr>
                  <th>Codigo</th>
                  <th>Lote</th>
                  <th>Descripcion</th>
                  <th>Almacen</th>
                  <th>Categoria</th>
                  <th>Presentacion</th>
                  <th>Umbral</th>
                  <th>Tipo</th>
                  <th>Cantidad</th>
                  <th>Fecha</th>
                </tr>
							</thead>
							<tbody>
								<?php
                  $respuesta = ControladorProductos::ctrMostrarProductosXLote();
                  foreach ($respuesta as $key => $value) {
                    echo '<tr>
                            <td>'.$value["codigo"].'</td>
                            <td>'.$value["lote"].'</td>
                            <td>'.$value["descripcion"].'</td>
                            <td>'.$value["almacen"].'</td>
                            <td>'.$value["categoria"].'</td>
                            <td>'.$value["presentacion"].'</td>
                            <td>'.$value["umbral"].'</td>
                            <td>'.$value["tipos"].'</td>
                            <td>'.$value["stock"].'</td>
                            <td>'.$value["fecha_lote"].'</td>
                          </tr>';
                    }
                  ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade agregarProductosM" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar productos</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="datatable4" class="data-table table hover table-bordered">
                <thead>
                  <tr>
                    <th>Almacen</th>
                    <th>Lote</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $respuesta = ControladorProductos::ctrMostrarProductosXLote();
                    foreach ($respuesta as $key => $value) {
                      echo '<tr>
                              <td>'.$value["almacen"].'</td>
                              <td>'.$value["lote"].'</td>
                              <td>'.$value["codigo"].'</td>
                              <td>'.$value["descripcion"].'</td>
                              <td>'.$value["stock_lote"].'</td>
                              <td>'.$value["fecha_lote"].'</td>
                            </tr>';
                      }
                    ?>    
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <form method="post">
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Categoria</label>
                    <input class="form-control" type="hidden" id="nuevoAlmacen" name="nuevoAlmacen" readonly/>
                    <select class="custom-select2 form-control" id="nuevaCategoria2" name="nuevaCategoria2" style="width: 100%; height: 38px">
                    	<?php
		                    $categoria = ControladorProductos::ctrMostrarCategoria();
		                    foreach ($categoria as $key => $value) {
		                      echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
		                      }
		                    ?>
										</select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Presentacion</label>
                    <input class="form-control" type="hidden" id="nuevoLote" name="nuevoLote" readonly/>
                    <select class="custom-select2 form-control" id="nuevaPresentacion" name="nuevaPresentacion" style="width: 100%; height: 38px">
                    	<?php
		                    $presentacion = ControladorProductos::ctrMostrarBrand();
		                    foreach ($presentacion as $key => $value) {
		                      echo '<option value="'.$value["id"].'">'.$value["presentacion"].'</option>';
		                      }
		                    ?>
										</select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Umbral</label>
                    <input class="form-control" type="hidden" id="nuevoCodigo" name="nuevoCodigo" readonly/>
                    <select class="custom-select2 form-control" id="nuevoUmbral" name="nuevoUmbral" style="width: 100%; height: 38px">
                    	<?php
		                    $umbral = ControladorProductos::ctrMostrarUmbral();
		                    foreach ($umbral as $key => $value) {
		                      echo '<option value="'.$value["id"].'">'.$value["umbral"].'</option>';
		                      }
		                    ?>
										</select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Tipo</label>
                    <input class="form-control" type="hidden" id="nuevaDescripcion" name="nuevaDescripcion" readonly/>
                    <input class="form-control" type="hidden" id="nuevaFecha3" name="nuevaFecha3" readonly/>
                    <select class="custom-select2 form-control" id="nuevoTipo" name="nuevoTipo" style="width: 100%; height: 38px">
                    	<?php
		                    $tipo = ControladorProductos::ctrMostrarTipo();
		                    foreach ($tipo as $key => $value) {
		                      echo '<option value="'.$value["id"].'">'.$value["tipos"].'</option>';
		                      }
		                    ?>
										</select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12 text-right">
                  <button type="submit" class="btn btn-success" onclick="crearProducto()"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Crear</button>
                </div>
              </div>
            </form>
            <?php
		          $crearProducto = new ControladorProductos();
		          $crearProducto -> ctrCrearProducto();
		        ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade visualizarProductos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar productos</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label>Codigo</label>
                  <input class="form-control" type="text" id="visualCodigo" name="visualCodigo" readonly/>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label>Lote</label>
                  <input class="form-control" type="text" id="visualLote" name="visualLote" readonly/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label>Descripcion</label>
                  <input class="form-control" type="text" id="visualDescripcion" name="visualDescripcion" readonly/>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label>Almacen</label>
                  <input class="form-control" type="text" id="visualAlmacen" name="visualAlmacen" readonly/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label>Categoria</label>
                  <input class="form-control" type="text" id="visualCategoria" name="visualCategoria" readonly/>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label>Presentacion</label>
                  <input class="form-control" type="text" id="visualPresentacion" name="visualPresentacion" readonly/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label>Umbral</label>
                  <input class="form-control" type="text" id="visualUmbral" name="visualUmbral" readonly/>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label>Tipo</label>
                  <input class="form-control" type="text" id="visualTipo" name="visualTipo" readonly/>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-2">Codigo QR</label>
              <div class="col-md-9 col-sm-10" id="qrcode2">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>