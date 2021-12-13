<?php  header('Content-type: text/html; charset=ISO-8859-1'); ?> 

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Usuarios</h3>
			
        </div>
        <div class="title_right">
			<div class="input-group">
				<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAltaUsuarios">Cargar Usuario</button>
			</div>
        </div>
		
		<div style="clear:both"></div>
    </div>

	<div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="card-box table-responsive">
                            <table class="table table-striped table-hover dataTable no-footer" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
										<th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($usuarios as $u): ?>
                                            <?php $tipo = ($u['tipo'] == 1)? "Administrador" : "Usuario"; ?>
                                            <?php $estado = ($u['estado'] == 1)? "Activo" : "Inactivo"; ?>
											
                                            <tr>
                                                <input type="hidden" name="id" class="id" 
                                                value="<?php echo $u['id']; ?>">
                                                <input type="hidden" name="nombre" class="nombre" 
                                                value="<?php echo $u['nombre']; ?>">
                                                <input type="hidden" name="estado" class="estado" 
                                                value="<?php echo $u['estado']; ?>">
                                                <input type="hidden" name="tipo" class="tipo" 
                                                value="<?php echo $u['tipo']; ?>">

                                                <td><?php echo $u['id']; ?></td>
                                                <td><?php echo $u['nombre']; ?></td>
                                                <td><?php echo $tipo; ?></td>
                                                <td><?php echo $estado; ?></td>
                                                <td>
                                                    <a 
                                                        class="acciones" 
                                                        href="#" 
                                                        data-accion="detalle" 
                                                        data-toggle="modal" 
                                                        data-target="#modalEdicionUsuarios">
															<i class="fas fa-info-circle"
															data-toggle="tooltip" 
															data-placement="Top" title="Detalle"></i>
													</a>
                                                    <a 
                                                        class="acciones" 
                                                        href="#" 
                                                        data-accion="password" 
                                                        data-toggle="modal" 
                                                        data-target="#modalPassword">
															<i class="fas fa-key"
															data-toggle="tooltip" 
															data-placement="Top" title="Reestablecer Contraseña"></i>
													</a>
													
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php //MODAL Alta de Usuarios ?>
<div class="modal fade" id="modalAltaUsuarios" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Alta de usuario</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Usuario/altaUsuario" method="POST">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
                                <div class="col-md-12">
                                    <h4>Nombre</h4>
									<input type="text" class="form-control" name="nombre">
								</div>
                                <div class="col-md-12">
                                    <h4>Contraseña</h4>
									<input type="text" class="form-control" name="pass">
								</div>
                                <div class="col-md-6">
                                    <h4>Tipo de usuario</h4>
									<select class="form-control" name="tipo">
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuario</option>
                                    </select>
								</div>
                                <div class="col-md-6">
                                    <h4>Estado</h4>
									<select class="form-control" name="estado">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
								</div>

							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-sm btn-success">Guardar</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>



<?php //MODAL DETALLE/Edicion de Usuarios ?>
<div class="modal fade" id="modalEdicionUsuarios" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Edición del usuario</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Usuario/modificacionUsuario" method="POST">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" name="mu_id" id="mu_id">
									
                                    <h4>Nombre</h4>
									<input type="text" class="form-control" name="mu_nombre" id="mu_nombre">
								</div>
                                <div class="col-md-6">
                                    <h4>Tipo de usuario</h4>
									<select class="form-control" name="mu_tipo" id="mu_tipo">
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuario</option>
                                    </select>
								</div>
                                <div class="col-md-6">
                                    <h4>Estado</h4>
									<select class="form-control" name="mu_estado" id="mu_estado">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
								</div>

							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-sm btn-success">Guardar</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>



<?php //MODAL DETALLE/Edicion de Usuarios ?>
<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Reestablecer la Contraseña del usuario</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Usuario/modificacionPassword" method="POST">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" name="mp_id" id="mp_id">
									
                                    <h4>Contraseña</h4>
									<input type="text" class="form-control" name="mp_pass" id="mp_pass">
								</div>
                                <div class="col-md-12">
                                    <h4>Reescribir Contraseña</h4>
									<input type="text" class="form-control" name="mp_pass2" id="mp_pass">
								</div>
							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-sm btn-success">Guardar</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>