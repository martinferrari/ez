<body class="login">
	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
				<form method="post" action="<?php echo base_url(); ?>admin/login">
					<h1>EZ Estudio</h1>
					<div>
						<input type="text" class="form-control" placeholder="Usuario" name="user"> 
					</div>
					<div>
						<input type="password" class="form-control" placeholder="Contraseña" name="pass">
					</div>
					<div>
						<input type="submit" class="form-control btn btn-primary" value="Iniciar Sesión">
					</div>
					<div class="clearfix"></div>
				</form>
			</section>
		</div>
	</div>