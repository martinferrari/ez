<body class="login">
	
	<div style="width:155px;margin:30px auto 0 auto;display:block;">
	<img class="logo" src="<?php echo base_url(); ?>_res/assets/images/logo.png" alt="">	
	</div>
	<div class="login_wrapper">
	
		<div class="animate form login_form">
			
			<section class="login_content">
				<form method="post" action="<?php echo base_url(); ?>admin/login">
					<h1>Iniciar Sesi�n</h1>
					<div>
						<input type="text" class="form-control" placeholder="Usuario" name="user"> 
					</div>
					<div>
						<input type="password" class="form-control" placeholder="Contrase�a" name="pass">
					</div>
					<div>
						<input type="submit" class="form-control btn btn-primary" value="Iniciar Sesi�n">
					</div>
					<div class="clearfix"></div>
				</form>
			</section>
		</div>
	</div>