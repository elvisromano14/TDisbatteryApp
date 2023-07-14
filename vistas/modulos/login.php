
<body class="login-page">
	<div class="login-header box-shadow">
		<div
			class="container-fluid d-flex justify-content-between align-items-center"
		>
			<div class="brand-logo">
				<a href="#">
					<img src="vistas/deskapp/vendors/images/deskapp-logo.svg" alt="" />
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vistas/deskapp/vendors/images/login-page-img.png" alt="" />
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Ingresar a DisbatteryApp</h2>
						</div>
						<form method="post">
							<div class="input-group custom">
								<input
									type="text" name="ingUsuario" 
									class="form-control form-control-lg"
									placeholder="Username"
								/>
								<div class="input-group-append custom">
									<span class="input-group-text"
										><i class="icon-copy dw dw-user1"></i
									></span>
								</div>
							</div>
							<div class="input-group custom">
								<input
									type="password" name="ingPassword"
									class="form-control form-control-lg"
									placeholder="**********"
								/>
								<div class="input-group-append custom">
									<span class="input-group-text"
										><i class="dw dw-padlock1"></i
									></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
									</div>
								</div>
							</div>
						</form>
						<?php
              $login = new ControladorUsuarios();
              $login -> ctrIngresoUsuario();        
            ?>
					</div>
				</div>
			</div>
		</div>
	</div>