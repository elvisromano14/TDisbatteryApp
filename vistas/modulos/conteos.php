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
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="card-box mb-30">
					<div class="pb-20">
						<table id="datatable5" class="table hover data-table-export table-bordered">
							<thead>
								<tr>
                  <th>Codigo</th>
                  <th>Productos</th>
                  <th>Unidades</th>
                  <th>Cantidades</th>
                  <th>Sobrante</th>
                  <th>Total</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
							</thead>
							<tbody>
								<?php
                  $respuesta = ControladorConteos::ctrMostrarConteos();
                  foreach ($respuesta as $key => $value) {
                    echo '<tr>
                            <td>'.$value["codigo"].'</td>
                            <td>'.$value["items"].'</td>
                            <td>'.$value["unidades"].'</td>
                            <td>'.$value["cantidades"].'</td>
                            <td>'.$value["sobrantes"].'</td>
                            <td>'.$value["total"].'</td>
                            <td>'.$value["fecha"].'</td>';
                            echo '<td>
                                      <div class="btn-group">';  
                                      if(($value["estatus"] == 0)){
                                        echo '<button class="btn btn-info btnImprimirConteo" codigoConteo="'.$value["codigo"].'">
                                        <i class="fa fa-print"></i>
                                        </button>';
                                      } 
                                      if(($value["estatus"] == 1)){
                                        echo '<button class="btn btn-success btnAprobarConteo" codigoConteo="'.$value["codigo"].'"><i class="icon-copy fa fa-thumbs-o-up" aria-hidden="true"></i></button>
                                              <button class="btn btn-danger btnAnularConteo" codigoConteo="'.$value["codigo"].'"><i class="icon-copy fa fa-thumbs-o-down" aria-hidden="true"></i></button>';
                                      }
                                      echo '</div>  
                                    </td>
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