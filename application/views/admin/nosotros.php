<?php // header('Content-type: text/html; charset=ISO-8859-1'); ?> 

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Nosotros</h3>
			
        </div>
        <div class="title_right">
			<div class="input-group">
				<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCargarNosotros">Cargar Persona</button>
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
                                        <th>Apellido</th>
                                        <th>Cargo</th>
                                        <th>Estado</th>
										<th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($nosotros as $n): ?>
											<?php 
												if($n['estado'] == 0):
													$estado = '<i class="fas fa-cloud-upload-alt borrador" data-toggle="tooltip" 
													data-placement="Top" title="Borrador"></i>';
												else:
													$estado = '<i class="fas fa-cloud-upload-alt publicada" data-toggle="tooltip" 
													data-placement="Top" title="Publicada"></i>';
												endif;
											?>

											<?php $foto = ($n['tiene_foto'] == 0) ? '<i class="fas fa-exclamation-triangle sin_foto" data-toggle="tooltip" 
															data-placement="Top" title="No tiene foto"></i>' : ""; ?>
                                            <tr>
                                                <input type="hidden" name="id" class="id" 
                                                value="<?php echo $n['id']; ?>">

                                                <input type="hidden" name="nombre" class="nombre" 
                                                value="<?php echo utf8_decode($n['nombre']); ?>">

                                                <input type="hidden" name="apellido" class="apellido" 
                                                value="<?php echo utf8_decode($n['apellido']); ?>">

												<input type="hidden" name="estado" class="estado" 
                                                value="<?php echo utf8_decode($n['estado']); ?>">

                                                <input type="hidden" name="cargo" class="cargo" 
                                                value="<?php echo utf8_decode($n['cargo']); ?>">

												<input type="hidden" name="cargo_traducido" class="cargo_traducido" 
                                                value="<?php echo utf8_decode($n['cargo_traducido']); ?>">

												<input type="hidden" name="foto" class="foto1" 
                                                value="<?php echo utf8_decode($n['foto1']); ?>">
												<input type="hidden" name="foto" class="foto2" 
                                                value="<?php echo utf8_decode($n['foto2']); ?>">
												<input type="hidden" name="foto" class="foto3" 
                                                value="<?php echo utf8_decode($n['foto3']); ?>">

                                                <td><?php echo $n['id']; ?></td>
                                                <td><?php echo utf8_decode($n['nombre']); ?></td>
                                                <td><?php echo utf8_decode($n['apellido']); ?></td>
                                                <td><?php echo utf8_decode($n['cargo']); ?></td>
												<td>
													<?php echo $estado; ?> <?php echo $foto; ?>
												</td>
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

													<a 
                                                        class="acciones" 
                                                        href="#" 
                                                        data-accion="imagenes" 
                                                        data-toggle="modal" 
                                                        data-target="#modalEdicionImagenes">
															<i class="fas fa-images"
															data-toggle="tooltip" 
															data-placement="Top" title="Foto"></i>	
													</a>

													<a 
                                                        class="acciones" 
                                                        href="#" 
                                                        data-accion="traduccion" 
                                                        data-toggle="modal" 
                                                        data-target="#modalTraduccion">
                                                        
															<i class="fas fa-globe-americas"
															data-toggle="tooltip" 
															data-placement="Top" title="Traducción"></i>
													</a>

													<a 
                                                        href="<?php echo base_url(); ?>nosotros/vista_previa" 
														target="_blank">
															<i class="fas fa-eye"
															data-toggle="tooltip" 
															data-placement="Top" title="Vista Previa"
															></i>
															
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



<?php //MODAL Cargar Nosotros ?>
<div class="modal fade" id="modalCargarNosotros" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			    <h4 class="modal-title">Cargar Persona</h4>	
                <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/nosotros/altaNosotros" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								
								<div class="col-md-12">
									<h4>Nombre</h4>
									<input type="text" class="form-control nombre" name="nombre">
								</div>
								
								<div class="col-md-12">
									<h4>Apellido</h4>
                                    <input type="text" class="form-control apellido" name="apellido">
								</div>

                                <div class="col-md-12">
									<h4>Cargo</h4>
                                    <input type="text" class="form-control cargo" name="cargo">
								</div>

                                <div class="col-md-12">
									<h4>Estado</h4>
									<select name="estado" class="form-control">
                                        <option value="0">Borrador</option>
                                        <option value="1">Publicada</option>
                                    </select>
								</div>

                                <div class="col-md-12">
									<h4>Fotos</h4>
									<input name="imagenes[]" type="file" multiple/>
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
</div>


<?php //MODAL Editar Nosotros ?>
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			    <h4 class="modal-title">Editar Datos de la Persona</h4>	
                <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/nosotros/modificacion_nosotros" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								
							<input type="hidden" name="en_id" id="en_id">

								<div class="col-md-12">
									<h4>Nombre</h4>
									<input type="text" class="form-control nombre" name="en_nombre" id="en_nombre">
								</div>
								
								<div class="col-md-12">
									<h4>Apellido</h4>
                                    <input type="text" class="form-control nombre" name="en_apellido" id="en_apellido">
								</div>

                                <div class="col-md-12">
									<h4>Cargo</h4>
									<input type="text" class="form-control cargo" name="en_cargo" id="en_cargo">
                                </div>

                                <div class="col-md-6">
									<h4>Estado</h4>
									<select name="en_estado" class="form-control">
                                        <option value="0">Borrador</option>
                                        <option value="1">Publicada</option>
                                    </select>
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


<?php //MODAL DETALLE/Edicion de Imagenes ?>
<div class="modal fade" id="modalEdicionImagenes" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Galer�a de Imagenes</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Nosotros/modificacion_imagen_nosotros" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<input type="hidden" class="form-control" name="mei_id" id="mei_id">

								<div class="col-md-12">
									<div id="contenedor_fotos"></div>
									<input type="file" class="form-control" name="mei_imagenes[]" class="mei_imagenes" id="mei_imagenes" multiple>
									<label 
										for="mei_imagenes" 
										id="lbl_mei_imagenes"
										class="btn btn-primary">Seleccionar imagenes para cargar</label>
								</div>
								
							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<button type="button" id="" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="guardar_corte" class="btn btn-sm btn-success">Guardar</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>




<?php //MODAL Traduccion ?>
<div class="modal fade" id="modalTraduccion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Agregar Idioma</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
				
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/nosotros/modificacionTraduccion" method="POST">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<input type="hidden" name="id" id="me_idioma_id">
								
								<div class="col-md-12">
									<h4>Cargo</h4>
									<input type="text" class="form-control cargo" name="cargo" id="mt_cargo">
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

