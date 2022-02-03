<?php  header('Content-type: text/html; charset=ISO-8859-1'); ?> 

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Novedades</h3>
			
        </div>
        <div class="title_right">
			<div class="input-group">
				<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCargarNovedad">Cargar Novedad</button>
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
                                        <th>T�tulo</th>
                                        <th>Fecha de Alta</th>
                                        <th>Estado</th>
										<th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($novedades as $n): ?>
											<?php 
												if($n['estado'] == 0):
													$estado = '<i class="fas fa-cloud-upload-alt borrador" data-toggle="tooltip" 
													data-placement="Top" title="Borrador"></i>';
												else:
													$estado = '<i class="fas fa-cloud-upload-alt publicada" data-toggle="tooltip" 
													data-placement="Top" title="Publicada"></i>';
												endif;
											?>

											<?php $destacada = ($n['tiene_destacada'] == 0) ? '<i class="fas fa-exclamation-triangle sin_destacada" data-toggle="tooltip" 
															data-placement="Top" title="No tiene imagen destacada"></i>' : ""; ?>
                                            <tr>
                                                <input type="hidden" name="id" class="id" 
                                                value="<?php echo $n['id']; ?>">

                                                <input type="hidden" name="titulo" class="titulo" 
                                                value="<?php echo utf8_decode($n['titulo']); ?>">

                                                <input type="hidden" name="descripcion" class="descripcion" 
                                                value="<?php echo utf8_decode($n['descripcion']); ?>">

												<input type="hidden" name="estado" class="estado" 
                                                value="<?php echo utf8_decode($n['estado']); ?>">

                                                <input type="hidden" name="fecha_alta" class="fecha_alta" 
                                                value="<?php echo utf8_decode($n['fecha_alta']); ?>">

												<input type="hidden" name="categoria" class="categoria" 
                                                value="<?php echo utf8_decode($n['categoria']); ?>">

                                                <td><?php echo $n['id']; ?></td>
                                                <td><?php echo utf8_decode($n['titulo']); ?></td>
                                                <td><?php echo $n['fecha_alta']; ?></td>
												<td>
													<?php echo $estado; ?> <?php echo $destacada; ?>
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
															data-placement="Top" title="Imagenes"></i>	
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
                                                        class="acciones" 
                                                        href="#" 
                                                        data-accion="videos" 
                                                        data-toggle="modal" 
                                                        data-target="#modalEdicionVideos">
															<i class="fas fa-video"
															data-toggle="tooltip" 
															data-placement="Top" title="Videos"></i>
													</a>

													<a 
                                                        href="<?php echo base_url(); ?>novedades/<?php echo $n['id']; ?>/vista_previa" 
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



<?php //MODAL Cargar novedad ?>
<div class="modal fade" id="modalCargarNovedad" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			    <h4 class="modal-title">Cargar Novedad</h4>	
                <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/novedades/altaNovedad" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								
								<div class="col-md-12">
									<h4>T��tulo</h4>
									<input type="text" class="form-control titulo" name="titulo">
								</div>
								
								<div class="col-md-12">
									<h4>Descripci�n</h4>
                                    <textarea class="form-control" name="descripcion"></textarea>
								</div>

                                <div class="col-md-6">
									<h4>Categor�a</h4>
									<select name="categoria" class="form-control">
                                        <?php foreach($categorias as $c):
                                            echo '<option value="'.$c['id'].'">'.$c['descripcion'].'</option>';
                                        endforeach; ?>
                                    </select>

                                <div class="col-md-6">
									<h4>Estado</h4>
									<select name="estado" class="form-control">
                                        <option value="0">Borrador</option>
                                        <option value="1">Publicada</option>
                                    </select>
								</div>

                                <div class="col-md-12">
									<h4>Imagenes</h4>
									<input name="imagenes[]" type="file" multiple />
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


<?php //MODAL Editar novedad ?>
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			    <h4 class="modal-title">Editar Novedad</h4>	
                <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/novedades/modificacion_novedad" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								
							<input type="hidden" name="en_id" id="en_id">

								<div class="col-md-12">
									<h4>T��tulo</h4>
									<input type="text" class="form-control titulo" name="en_titulo" id="en_titulo">
								</div>
								
								<div class="col-md-12">
									<h4>Descripci�n</h4>
                                    <textarea class="form-control" name="en_descripcion"></textarea>
								</div>

                                <div class="col-md-6">
									<h4>Categor�a</h4>
									<select name="en_categoria" class="form-control">
                                        <?php foreach($categorias as $c):
                                            echo '<option value="'.$c['id'].'">'.$c['descripcion'].'</option>';
                                        endforeach; ?>
                                    </select>

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
						<a href="#" id="btn_borrar" class="btn btn-sm btn-danger btn-borrar">Borrar Novedad</a>
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
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Novedades/modificacionImagenesNovedad" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<input type="hidden" class="form-control" name="mei_id" id="mei_id">

								<div class="col-md-12">
									<div class="cargando_ajax"></div>
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



<?php //MODAL DETALLE/Edicion de Videos ?>
<div class="modal fade" id="modalEdicionVideos" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Galer�a de Videos</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Novedades/modificacionVideosNovedad" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<input type="hidden" class="form-control" name="mev_id" id="mev_id">

								<div class="col-md-12">
									<div class="cargando_ajax"></div>
									<div id="contenedor_videos"></div>

									<input type="file" class="form-control" id="mev_videos" name="mev_videos[]" class="mev_videos" multiple>
									<label 
										for="mev_videos" 
										id="lbl_mev_videos"
										class="btn btn-primary">Seleccionar videos para cargar</label>
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
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Novedades/modificacionIdiomaNovedad" method="POST">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<input type="hidden" name="id" id="me_idioma_id">
								
								<div class="col-md-12">
									<h4>T��tulo</h4>
									<input type="text" class="form-control titulo" name="titulo" id="mt_titulo">
								</div>
								
								<div class="col-md-12">
									<h4>Descripci�n</h4>
                                    <textarea class="form-control" name="descripcion" id="mt_descripcion"></textarea>
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

