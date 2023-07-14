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
								Lista de productos
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 col-sm-12">
				<div class="card-box mb-30">
					<div class="pb-20">
						<table id="datatable" class="table hover data-table-export table-bordered">
							<thead>
								<tr>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Categoria</th>
                  <th>Presentacion</th>
                  <th>Umbral</th>
                  <th>Tipo</th>
                  <th>Cantidad</th>
                </tr>
							</thead>
							<tbody>
								<?php
                  $respuesta = ControladorProductos::ctrMostrarProductos();
                  foreach ($respuesta as $key => $value) {
                    echo '<tr>
                            <td>'.$value["codigo"].'</td>
                            <td>'.$value["descripcion"].'</td>
                            <td>'.$value["categoria"].'</td>
                            <td>'.$value["presentacion"].'</td>
                            <td>'.$value["umbral"].'</td>
                            <td>'.$value["tipos"].'</td>
                            <td>'.$value["stock"].'</td>
                          </tr>';
                    }
                  ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-sm-12">
				<div class="card-box mb-30">
					<div class="pb-20">
						<form class="form-horizontal form-label-left">
              <div class="form-group row">
                <label class="control-label col-md-2 col-sm-2">Codigo</label>
                <div class="col-md-9 col-sm-10 ">
                  <input type="text" class="form-control" name="dataCodigo" id="dataCodigo" readonly="readonly">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-2 col-sm-2">Descripcion</label>
                <div class="col-md-9 col-sm-10">
                  <input class="form-control" type="text" name="dataDescripcion" id="dataDescripcion" cols="2" rows="2" readonly="readonly">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-2 col-sm-2">Categoria</label>
                <div class="col-md-9 col-sm-10">
                  <input type="text" class="form-control" name="dataCategoria" id="dataCategoria" readonly="readonly">

                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-2 col-sm-2">Presentacion</label>
                <div class="col-md-9 col-sm-10">
                  <input type="text" class="form-control" name="dataBrand" id="dataBrand" readonly="readonly">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-2 col-sm-2">Umbral</label>
                <div class="col-md-9 col-sm-10">
                  <input type="text" class="form-control" name="dataUmbral" id="dataUmbral" readonly="readonly">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-2 col-sm-2">Tipo</label>
                <div class="col-md-9 col-sm-10 ">
                  <input type="text" class="form-control" name="dataTipo" id="dataTipo" readonly="readonly">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-2 col-sm-2">Cantidad</label>
                <div class="col-md-9 col-sm-10">
                  <input type="number" class="form-control" name="dataCantidad" id="dataCantidad" readonly="readonly">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-2 col-sm-2 ">Lotes</label>
                <div class="col-md-9 col-sm-10">
                  <table id="datatable4" class="table hover data-table-export table-bordered">
                    <thead>
                      <th>Lotes</th>
                      <th>Almacen</th>
                      <th>Stock</th>
                      <th>Fecha</th>
                    </thead>
                    <tbody id="nuevosLotes">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-2 col-sm-2">Codigo QR (Lote)</label>
                <div class="col-md-9 col-sm-10" id="qrcode">
                </div>
              </div>
            </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>