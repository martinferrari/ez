<?php  header('Content-type: text/html; charset=ISO-8859-1'); ?> 

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Zocalos de secciones</h3>
			
        </div>
        <div class="title_right">
			<!-- <div class="input-group">
				<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalZocalo">Cargar Usuario</button>
			</div> -->
        </div>
		
		<div style="clear:both"></div>
    </div>

	<div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="card-box table-responsive">
                        <table class="table table-striped table-hover no-footer tabla_zocalos">
                            <thead>
                                <tr>
                                    <th>Sección</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Inicio</td>
                                    <td>
                                        <img src="<?php echo base_url(); ?>_res/zocalos/inicio.jpg" class="img_zocalo">
                                    </td>
                                    <td>
                                        <a 
                                            class="acciones" 
                                            href="#" 
                                            data-accion="imagenes" 
                                            data-toggle="modal" 
                                            data-target="#modalZocalo"
                                            data-seccion="Inicio">

                                                <i class="fas fa-pen"
                                                data-toggle="tooltip" 
                                                data-placement="Top" title="Cambiar"></i>	
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Obras</td>
                                    <td><img src="<?php echo base_url(); ?>_res/zocalos/obras.jpg" class="img_zocalo"></td>
                                    <td>
                                        <a 
                                            class="acciones" 
                                            href="#" 
                                            data-accion="imagenes" 
                                            data-toggle="modal" 
                                            data-target="#modalZocalo"
                                            data-seccion="Obras">

                                                <i class="fas fa-pen"
                                                data-toggle="tooltip" 
                                                data-placement="Top" title="Cambiar"></i>	
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Obras en ejecución</td>
                                    <td><img src="<?php echo base_url(); ?>_res/zocalos/obras_ejecucion.jpg" class="img_zocalo"></td>
                                    <td>
                                        <a 
                                            class="acciones" 
                                            href="#" 
                                            data-accion="imagenes" 
                                            data-toggle="modal" 
                                            data-target="#modalZocalo"
                                            data-seccion="Obras en ejecución">

                                                <i class="fas fa-pen"
                                                data-toggle="tooltip" 
                                                data-placement="Top" title="Cambiar"></i>	
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Proyectos</td>
                                    <td><img src="<?php echo base_url(); ?>_res/zocalos/proyectos.jpg" class="img_zocalo"></td>
                                    <td>
                                        <a 
                                            class="acciones" 
                                            href="#" 
                                            data-accion="imagenes" 
                                            data-toggle="modal" 
                                            data-target="#modalZocalo"
                                            data-seccion="Proyectos">

                                                <i class="fas fa-pen"
                                                data-toggle="tooltip" 
                                                data-placement="Top" title="Cambiar"></i>	
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nosotros</td>
                                    <td><img src="<?php echo base_url(); ?>_res/zocalos/nosotros.jpg" class="img_zocalo"></td>
                                    <td>
                                        <a 
                                            class="acciones" 
                                            href="#" 
                                            data-accion="imagenes" 
                                            data-toggle="modal" 
                                            data-target="#modalZocalo"
                                            data-seccion="Nosotros">

                                                <i class="fas fa-pen"
                                                data-toggle="tooltip" 
                                                data-placement="Top" title="Cambiar"></i>	
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Novedades</td>
                                    <td><img src="<?php echo base_url(); ?>_res/zocalos/novedades.jpg" class="img_zocalo"></td>
                                    <td>
                                        <a 
                                            class="acciones" 
                                            href="#" 
                                            data-accion="imagenes" 
                                            data-toggle="modal" 
                                            data-target="#modalZocalo"
                                            data-seccion="Novedades">

                                                <i class="fas fa-pen"
                                                data-toggle="tooltip" 
                                                data-placement="Top" title="Cambiar"></i>	
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contacto</td>
                                    <td><img src="<?php echo base_url(); ?>_res/zocalos/contacto.jpg" class="img_zocalo"></td>
                                    <td>
                                        <a 
                                            class="acciones" 
                                            href="#" 
                                            data-accion="imagenes" 
                                            data-toggle="modal" 
                                            data-target="#modalZocalo"
                                            data-seccion="Contacto">

                                                <i class="fas fa-pen"
                                                data-toggle="tooltip" 
                                                data-placement="Top" title="Cambiar"></i>	
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<?php //MODAL Zocalo  ?>
<div class="modal fade" id="modalZocalo" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Imagen del Zócalo de la sección <span></span></h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/zocalo/modificacion" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<input type="hidden" class="form-control" name="mz_seccion" id="mz_seccion" value="">

								<div class="col-md-12">
								
									<input type="file" class="form-control" name="mz_imagen" id="mz_imagen">
									<label 
										for="mz_imagen" 
										id="lbl_mz_seccion"
										class="btn btn-primary">Seleccionar imagen para cargar</label>
                                    
                                    <h6 style="color:red;text-align:center;font-size:12px;">Solo archivos JPG</h6>
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
