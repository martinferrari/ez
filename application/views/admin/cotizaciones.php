<?php  header('Content-type: text/html; charset=ISO-8859-1'); ?> 

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Cotizaciones recibidas</h3>
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
                                        <th>Nombre y apellido</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Estado</th>
										<th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
										
										foreach($cotizaciones as $c): ?>
											<?php 
											$estado = "";
											switch($c['estado']):
												case 1:
												$estado = 'Recibida';
												break;

												case 2:
												$estado = 'Cotizada';
												break;

												case 3:
												$estado = 'Respondida';
												break;
												
											endswitch;
											?>
											
                                            <tr>
											<input type="hidden" class="datos" 
                                  			value='<?php echo json_encode ((array) $c); ?>'>

                                                <td><?php echo $c['id']; ?></td>
                                                <td><?php echo utf8_decode($c['nombre_apellido']); ?></td>
                                                <td><?php echo $c['telefono']; ?></td>
                                                <td><?php echo $c['email']; ?></td>
                                                <td><?php echo $estado; ?></td>
                                                <td>
                                                    <a 
                                                        class="acciones" 
                                                        href="#" 
                                                        data-accion="detalle" 
                                                        data-toggle="modal" 
                                                        data-target="#modalEdicion">
															<i class="fas fa-info-circle"
															data-toggle="tooltip" 
															data-placement="Top" title="Detalle"></i>
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





<?php //MODAL Editar Nosotros ?>
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			    <h4 class="modal-title">Ver/Editar detalle de Cotizaci&oacute;n</h4>	
                <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/modificacion_cotizacion" method="POST">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								
								<div class="col-md-6">
									<h4>N&uacute;mero de Cotizaci&oacute;n</h4>
									<input type="text" class="form-control" id="ec_id" name="id" readonly>
								</div>

                                <div class="col-md-6">
									<h4>Nombre y apellido</h4>
									<input type="text" class="form-control" name="nombre" id="ec_nombre_apellido">
								</div>
								
								<div class="col-md-4">
									<h4>Tel&eacute;fono</h4>
                                    <input type="text" class="form-control" name="telefono" id="ec_telefono">
								</div>

                                <div class="col-md-4">
									<h4>Email</h4>
									<input type="text" class="form-control" name="email" id="ec_email">
                                </div>

                                <div class="col-md-4">
									<h4>Estado</h4>
									<select class="form-control" name="estado" id="ec_estado">
                                        <option value="1">Recibida</option>
                                        <option value="2">Cotizada</option>
										<option value="3">Respondida</option>
                                    </select>
								</div>

                                <div class="col-md-12">
									<h4>Detalle de los productos cotizados</h4>
									<div class="cargando_ajax"></div>
								</div>

                                <div id="detalle">
                                    
                                </div>


							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<a href="#" id="btn_borrar" class="btn btn-sm btn-danger btn-borrar">Borrar Registro</a>
						<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-sm btn-success">Guardar</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>
</div>