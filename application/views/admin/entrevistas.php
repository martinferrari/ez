<?php  header('Content-type: text/html; charset=ISO-8859-1'); ?> 

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Contacto | Entrevistas</h3>
			
        </div>
        <div class="title_right">
			<div class="input-group">
				
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
                                        <th>Email</th>
                                        <th>Motivo</th>
										<th>Mensaje</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($entrevistas as $e): ?>
											
                                            <tr>
                                                <input type="hidden" class="id" 
                                                value="<?php echo $e['id']; ?>">
                                                <input type="hidden" class="nombre" 
                                                value="<?php echo utf8_decode($e['nombre']); ?>">
                                                <input type="hidden" class="telefono" 
                                                value="<?php echo $e['telefono']; ?>">
                                                <input type="hidden" class="profesion" 
                                                value="<?php echo utf8_decode($e['profesion']); ?>">
                                                <input type="hidden" class="email" 
                                                value="<?php echo $e['email']; ?>">
                                                <input type="hidden" class="direccion" 
                                                value="<?php echo utf8_decode($e['direccion']); ?>">
                                                <input type="hidden" class="medidas" 
                                                value="<?php echo $e['medidas']; ?>">
                                                <input type="hidden" class="motivo" 
                                                value="<?php echo $e['motivo']; ?>">
                                                <input type="hidden" class="mensaje" 
                                                value="<?php echo utf8_decode($e['mensaje']); ?>">

                                                <td><?php echo $e['id']; ?></td>
                                                <td><?php echo utf8_decode($e['nombre']); ?></td>
                                                <td><?php echo utf8_decode($e['email']); ?></td>
                                                <td><?php echo utf8_decode($e['motivo']); ?></td>
												<td><?php echo utf8_decode($e['mensaje']); ?></td>
                                                <td>
													
                                                    <a 
                                                        class="acciones" 
                                                        href="#" 
                                                        data-accion="detalle_entrevista" 
                                                        data-toggle="modal" 
                                                        data-target="#modalDetalleEntrevista">
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



<?php //MODAL Cargar novedad ?>
<div class="modal fade" id="modalDetalleEntrevista" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			    <h4 class="modal-title">Detalle</h4>	
                <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body contacto">				
				
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								
								<div class="col-md-12">
									<h4>Nombre</h4>
									<p id="nombre"></p>
								</div>
                                <div class="col-md-12">
									<h4>Telefono</h4>
									<p id="telefono"></p>
								</div>
                                <div class="col-md-12">
									<h4>Profesion</h4>
									<p id="profesion"></p>
								</div>
                                <div class="col-md-12">
									<h4>Email</h4>
									<p id="email"></p>
								</div>
                                <div class="col-md-12">
									<h4>Direccion</h4>
									<p id="direccion"></p>
								</div>
                                <div class="col-md-12">
									<h4>Medidas</h4>
									<p id="medidas"></p>
								</div>
                                <div class="col-md-12">
									<h4>Motivo</h4>
									<p id="motivo"></p>
								</div>
                                <div class="col-md-12">
									<h4>Mensaje</h4>
									<p id="mensaje"></p>
								</div>

							


							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>
</div>