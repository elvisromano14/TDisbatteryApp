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
								Lista de conteos
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
    <form>
      <div class="row">
        <div class="col-md-2 col-sm-12">
          <div class="form-group">
            <label>Fecha</label>
            <input class="form-control date-picker" placeholder="Seleccionar fecha" type="text" id="nuevaFecha" name="nuevaFecha" required/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".agregarProductos">Agregar</button>
          <button type="button" class="btn btn-info bbb" data-toggle="modal" data-target=".qrcodeProductos">Escaneo</button>
          <button type="button" class="btn btn-danger" onclick="guardarConteo()"><i class="nav-icon fa fa-search"></i> Guardar</button>
        </div>
      </div>
    </form>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="card-box mb-30">
					<div class="pb-20">
						<table id="datatable3" class="table hover nowrap table-bordered">
							<thead>
								<tr>
                  <th>Quitar</th>
                  <th>Lote</th>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Und Med</th>
                  <th>Unidades</th>
                  <th>Cantidades</th>
                  <th>Sobrante</th>
                  <th>Total</th>
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
              <table id="datatable2" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                  <tr>
                    <th>Lote</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $respuesta = ControladorProductos::ctrMostrarProductosXLote();
                    foreach ($respuesta as $key => $value) {
                      echo '<tr>
                              <td>'.$value["lote"].'</td>
                              <td>'.$value["codigo"].'</td>
                              <td>'.$value["descripcion"].'</td>
                              <td>'.$value["stock"].'</td>
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
            <div class="card-box">
              <video id="qrScanner" accept="image/*"></video>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>