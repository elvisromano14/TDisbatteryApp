<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Inventario</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="inicio">Inicio</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Creacion de conteos
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
    <form>
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="card-box mb-30">
            <div class="row pb-20">
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                  <label>Fecha</label>
                  <input class="form-control date-picker" placeholder="Seleccionar fecha" type="text" id="nuevaFecha" name="nuevaFecha" required/>
                  <input  type="hidden" id="nuevoConteo" name="nuevoConteo" value="1"/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".agregarProductos"><i class="icon-copy fa fa-plus-square" aria-hidden="true"></i> Agregar</button>
                <button type="button" class="btn btn-info bbb" data-toggle="modal" data-target=".qrcodeProductos"> <i class="nav-icon fa fa-search"></i> Escaneo</button>
                <button type="button" class="btn btn-danger" onclick="guardarConteo()"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Guardar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="card-box mb-30">
					<div class="pb-20">
						<table id="datatable3" class="table hover data-table-export table-bordered">
							<thead>
								<tr>
                  <th>Quitar</th>
                  <th>Almacen</th>
                  <th>Lote</th>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Und Med</th>
                  <th>Unidades</th>
                  <th>Cantidades</th>
                  <th>Sobrante</th>
                  <th>Total</th>
                  <th>Fecha Lote</th>
                </tr>
							</thead>
							<tbody>
							</tbody>
						</table>
            <input type="hidden" id="listaProductos" name="listaProductos">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade agregarProductos" tabindex="-1" role="dialog" aria-hidden="true">
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
              <table id="datatable2" class="data-table table hover table-bordered">
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
        <div class="row modalPrd">
          <div class="col-sm-12">
            <form>
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Almacen</label>
                    <input class="form-control" type="text" id="nuevoAlmacen" name="nuevoAlmacen" readonly/>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Lote</label>
                    <input class="form-control" type="text" id="nuevoLote" name="nuevoLote" readonly/>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Codigo</label>
                    <input class="form-control" type="text" id="nuevoCodigo" name="nuevoCodigo" readonly/>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Descripcion</label>
                    <input class="form-control" type="text" id="nuevaDescripcion" name="nuevaDescripcion" readonly/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-12">
                  <div class="form-group">
                    <label>Unida Medida</label>
                    <select class="custom-select2 form-control" id="nuevaUndMed" name="nuevaUndMed" style="width: 100%; height: 38px" required>
                      <option value="">Seleccionar...</option>
                      <option value="Paleta">Paleta</option>
                      <option value="Caja">Caja</option>
                      <option value="Unidad">Und</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div class="form-group">
                    <label>Unidades</label>
                    <input class="form-control" type="number" id="nuevaUnidad" name="nuevaUnidad" value="0" required/>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div class="form-group">
                    <label>Cantidades</label>
                    <input class="form-control" type="number" id="nuevoCantidad" name="nuevoCantidad" value="0" required/>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div class="form-group">
                    <label>Sobrantes</label>
                    <input class="form-control" type="number" id="nuevoSobrante" name="nuevoSobrante" value="0" required/>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12 pull-right">
                  <div class="form-group">
                    <label>Total</label>
                    <input class="form-control" type="text" id="nuevoTotal" name="nuevoTotal" readonly/>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12 pull-right">
                  <div class="form-group">
                    <label>Fecha</label>
                    <input class="form-control date-picker" type="text" id="nuevaFecha2" name="nuevaFecha2" readonly/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12 text-right">
                  <button type="button" class="btn btn-success" onclick="anexarProducto()"><i class="nav-icon fa fa-search"></i> Anexar</button>
                  <button type="button" class="btn btn-danger" onclick="limpiarModal()"><i class="fa-solid fa-broom"></i> Limpiar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade agregarProductosQR" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar productos</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row modalPrdQR">
          <div class="col-sm-12">
            <form>
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Almacen</label>
                    <input class="form-control" type="text" id="nuevoAlmacenQR" name="nuevoAlmacenQR" readonly/>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Lote</label>
                    <input class="form-control" type="text" id="nuevoLoteQR" name="nuevoLoteQR" readonly/>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Codigo</label>
                    <input class="form-control" type="text" id="nuevoCodigoQR" name="nuevoCodigoQR" readonly/>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label>Descripcion</label>
                    <input class="form-control" type="text" id="nuevaDescripcionQR" name="nuevaDescripcionQR" readonly/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-12">
                  <div class="form-group">
                    <label>Unida Medida</label>
                    <select class="custom-select2 form-control" id="nuevaUndMedQR" name="nuevaUndMedQR" style="width: 100%; height: 38px" required>
                      <option value="">Seleccionar...</option>
                      <option value="Paleta">Paleta</option>
                      <option value="Caja">Caja</option>
                      <option value="Unidad">Und</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div class="form-group">
                    <label>Unidades</label>
                    <input class="form-control" type="number" id="nuevaUnidadQR" name="nuevaUnidadQR" value="0" required/>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div class="form-group">
                    <label>Cantidades</label>
                    <input class="form-control" type="number" id="nuevoCantidadQR" name="nuevoCantidadQR" value="0" required/>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div class="form-group">
                    <label>Sobrantes</label>
                    <input class="form-control" type="number" id="nuevoSobranteQR" name="nuevoSobranteQR" value="0" required/>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12 pull-right">
                  <div class="form-group">
                    <label>Total</label>
                    <input class="form-control" type="text" id="nuevoTotalQR" name="nuevoTotalQR" readonly/>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12 pull-right">
                  <div class="form-group">
                    <label>Fecha</label>
                    <input class="form-control date-picker" type="text" id="nuevaFechaQR" name="nuevaFechaQR" readonly/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12 text-right">
                  <button type="button" class="btn btn-success" onclick="anexarProductoQR()"><i class="nav-icon fa fa-search"></i> Anexar</button>
                  <button type="button" class="btn btn-danger" onclick="limpiarModal()"><i class="fa-solid fa-broom"></i> Limpiar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade qrcodeProductos" tabindex="-1" role="dialog" aria-hidden="true">
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
            <div id="reader" class="card-box">
              <video id="qrScanner" accept="image/*"></video>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>