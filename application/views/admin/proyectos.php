<?php  header('Content-type: text/html; charset=ISO-8859-1'); ?> 

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Proyectos</h3>
			
        </div>
        <div class="title_right">
			<div class="input-group">
				<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCargarProyecto">Cargar Proyecto</button>
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
                                        <th>T&iacute;tulo</th>
                                        <th>Fecha de Alta</th>
                                        <th>Estado</th>
										<th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($proyectos as $p): ?>
											<?php 
												if($p['estado'] == 0):
													$estado = '<i class="fas fa-cloud-upload-alt borrador" data-toggle="tooltip" 
													data-placement="Top" title="Borrador"></i>';
												else:
													$estado = '<i class="fas fa-cloud-upload-alt publicada" data-toggle="tooltip" 
													data-placement="Top" title="Publicada"></i>';
												endif;
											?>
											<?php $destacada = ($p['tiene_destacada'] == 0) ? '<i class="fas fa-exclamation-triangle sin_destacada" data-toggle="tooltip" 
															data-placement="Top" title="No tiene imagen destacada"></i>' : ""; ?>
                                            <tr>
                                                <input type="hidden" name="id" class="id" 
                                                value="<?php echo $p['id']; ?>">

                                                <input type="hidden" name="titulo" class="titulo" 
                                                value="<?php echo utf8_decode($p['titulo']); ?>">

                                                <input type="hidden" name="descripcion" class="descripcion" 
                                                value="<?php echo utf8_decode($p['descripcion']); ?>">

												<input type="hidden" name="anio_proyecto" class="anio_proyecto" 
                                                value="<?php echo $p['anio_proyecto']; ?>">
												<input type="hidden" name="proyecto" class="proyecto" 
                                                value="<?php echo utf8_decode($p['proyecto']); ?>">
												<input type="hidden" name="ejecucion" class="ejecucion" 
                                                value="<?php echo utf8_decode($p['ejecucion']); ?>">

												<input type="hidden" name="construccion_direccion" class="construccion_direccion" 
                                                value="<?php echo utf8_decode($p['construccion_direccion']); ?>">

												<input type="hidden" name="disenio_dim_estruc" class="disenio_dim_estruc" 
                                                value="<?php echo utf8_decode($p['disenio_dim_estruc']); ?>">

												<input type="hidden" name="tipologia" class="tipologia" 
                                                value="<?php echo utf8_decode($p['tipologia']); ?>">
												<input type="hidden" name="disenio_dim_clim" class="disenio_dim_clim" 
                                                value="<?php echo utf8_decode($p['disenio_dim_clim']); ?>">
												<input type="hidden" name="area" class="area" 
                                                value="<?php echo utf8_decode($p['area']); ?>">
												<input type="hidden" name="ubicacion" class="ubicacion" 
                                                value="<?php echo utf8_decode($p['ubicacion']); ?>">
												<input type="hidden" name="estado" class="estado" 
                                                value="<?php echo $p['estado']; ?>">

                                                <input type="hidden" name="fecha_alta" class="fecha_alta" 
                                                value="<?php echo $p['fecha_alta']; ?>">


                                                <td><?php echo $p['id']; ?></td>
                                                <td><?php echo utf8_decode($p['titulo']); ?></td>
                                                <td><?php echo $p['fecha_alta']; ?></td>
												<td><?php echo $estado; ?> <?php echo $destacada; ?></td>
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
                                                        data-accion="videos" 
                                                        data-toggle="modal" 
                                                        data-target="#modalEdicionVideos">
                                                        
															<i class="fas fa-video"
															data-toggle="tooltip" 
															data-placement="Top" title="Videos"></i>
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
                                                        href="<?php echo base_url(); ?>proyectos/<?php echo $p['id']; ?>/vista_previa" 
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







<?php //MODAL Cargar Proyecto ?>
<div class="modal fade" id="modalCargarProyecto" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Cargar Proyecto</h4>	
        <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
				
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Proyectos/altaProyecto" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<input type="hidden" class="form-control" name="me_id" id="id">
								
								<div class="col-md-12">
									<h4>T��tulo</h4>
									<input type="text" class="form-control titulo" name="titulo">
								</div>
								
								<div class="col-md-12">
									<h4>Descripci�n</h4>
                                    <textarea class="form-control" name="descripcion"></textarea>
								</div>

                                <div class="col-md-6">
									<h4>A�o del proyecto</h4>
									<input type="number" class="form-control" name="anio_proyecto">
								</div>
                                <div class="col-md-6">
									<h4>Area</h4>
									<input type="text" class="form-control" name="area">
								</div>
                                <div class="col-md-12">
									<h4>Proyecto</h4>
									<input type="text" class="form-control" name="proyecto">
								</div>
                                <div class="col-md-12">
									<h4>Ejecuci�n</h4>
									<input type="text" class="form-control" name="ejecucion">
								</div>
                                <div class="col-md-12">
									<h4>Construcci�n</h4>
									<input type="text" class="form-control" name="construccion">
								</div>
                                <div class="col-md-12">
									<h4>Dise�o y Dimensionado Estructural</h4>
									<input type="text" class="form-control" name="disenio_dim_est">
								</div>
                                <div class="col-md-12">
									<h4>Tipolog�a</h4>
									<input type="text" class="form-control" name="tipologia">
								</div>
                                <div class="col-md-12">
									<h4>Dise�o y Dimensionado de Climatizaci�n</h4>
									<input type="text" class="form-control" name="disenio_dim_clim">
								</div>
                                <div class="col-md-6">
									<h4>Ubicaci�n</h4>
									<input type="text" class="form-control" name="ubicacion">
								</div>
                                <div class="col-md-6">
									<h4>Estado</h4>
									<select name="estado" class="form-control">
                                        <option value="0">Borrador</option>
                                        <option value="1">Publicado</option>
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
						<button type="button" id="" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="guardar_corte" class="btn btn-sm btn-success">Guardar</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>



<?php //MODAL DETALLE/Edicion ?>
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Detalle del Proyecto</h4>	
                <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
				
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Proyectos/modificacionProyecto" method="POST" >
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<input type="hidden" class="form-control" name="me_id" id="me_id">
								
								<div class="col-md-12">
									<h4>T�tulo</h4>
									<input type="text" class="form-control titulo" name="me_titulo" id="me_titulo">
								</div>
								
								<div class="col-md-12">
									<h4>Descripci�n</h4>
									<textarea class="form-control" name="me_descripcion" id="me_descripcion"></textarea>
								</div>
								
								<div class="col-md-12">
									<h4>Proyecto</h4>
									<input type="text" class="form-control" name="me_proyecto" id="me_proyecto">
								</div>
								<div class="col-md-12">
									<h4>Ejecuci�n</h4>
									<input type="text" class="form-control" name="me_ejecucion" id="me_ejecucion">
								</div>
								<div class="col-md-12">
									<h4>Construcci�n</h4>
									<input type="text" class="form-control" name="me_construccion_direccion" id="me_construccion_direccion">
								</div>
								<div class="col-md-12">
									<h4>Dise�o y Dimensionado Estructural</h4>
									<input type="text" class="form-control" name="me_disenio_dim_estruc" id="me_disenio_dim_estruc">
								</div>
								<div class="col-md-12">
									<h4>Tipolog�a</h4>
									<input type="text" class="form-control" name="me_tipologia" id="me_tipologia">
								</div>
								<div class="col-md-12">
									<h4>Dise�o y Dimensionado de Climatizaci�n</h4>
									<input type="text" class="form-control" name="me_disenio_dim_clim" id="me_disenio_dim_clim">
								</div>
								<div class="col-md-6">
									<h4>A�o del Proyecto</h4>
									<input type="text" class="form-control" name="me_anio_proyecto" id="me_anio_proyecto">
								</div>
								<div class="col-md-6">
									<h4>Area</h4>
									<input type="text" class="form-control" name="me_area" id="me_area">
								</div>
								<div class="col-md-12">
									<h4>Ubicaci�n</h4>
									<input type="text" class="form-control" name="me_ubicacion" id="me_ubicacion">
								</div>
								<div class="col-md-12">
									<h4>Estado</h4>
									<select class="form-control" name="me_estado" id="me_estado">
										<option value="0">Borrador</option>
										<option value="1">Publicado</option>
									</select>
								</div>

							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<a href="#" id="btn_borrar" class="btn btn-sm btn-danger btn-borrar">Borrar Proyecto</a>
						<button type="button" id="" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="guardar_corte" class="btn btn-sm btn-success">Guardar</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>



<?php //MODAL DETALLE/Edicion de Imagenes ?>
<div class="modal fade" id="modalEdicionImagenes" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Galer�a de Imagenes del Proyecto</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Proyectos/modificacionImagenesProyecto" method="POST" enctype="multipart/form-data">
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
			  <h4 class="modal-title">Galer�a de Videos del Proyecto</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Proyectos/modificacionVideosProyecto" method="POST" enctype="multipart/form-data">
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
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/Proyectos/modificacionIdiomaProyecto" method="POST">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<input type="hidden"  name="id" id="me_idioma_id">
								
								<div class="col-md-12">
									<h4>T��tulo</h4>
									<input type="text" class="form-control titulo" name="titulo" id="mt_titulo">
								</div>
								
								<div class="col-md-12">
									<h4>Descripci�n</h4>
                                    <textarea class="form-control" name="descripcion" id="mt_descripcion"></textarea>
								</div>
								<div class="col-md-6">
									<h4>Tipolog�a</h4>
									<input type="text" class="form-control" name="tipologia" id="mt_tipologia">
								</div>
                                <div class="col-md-12">
									<h4>Proyecto</h4>
									<input type="text" class="form-control" name="proyecto" id="mt_proyecto">
								</div>
								<div class="col-md-12">
									<h4>Ubicaci�n</h4>
									<input type="text" class="form-control" name="ubicacion" id="mt_ubicacion">
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