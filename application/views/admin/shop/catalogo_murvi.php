<?php // header('Content-type: text/html; charset=ISO-8859-1'); ?> 

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Mosaicos Murvi</h3>
        </div>
        <div class="title_right">
			<div class="input-group">
				<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCargarProducto">Agregar Producto</button>
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
                                        <th>C&oacute;digo</th>
                                        <th>Formato</th>
                                        <th>Espesor</th>
                                        <th>M2 por caja</th>
                                        <th>Categor&iacute;a</th>
										<th>Estado</th>
										<th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
										$categoria[1] = "Colores";
										$categoria[2] = "Degrade";
										$categoria[3] = "Guardas";
										$categoria[4] = "Mezclas";
										foreach($productos as $p): ?>
											<?php 
												if($p['estado'] == 0):
													$estado = 'No Disponible';
												else:
													$estado = 'Disponible';
												endif;
											?>
											
                                            <tr>
											<input type="hidden" class="datos" 
                                  			value='<?php echo json_encode ((array) $p); ?>'>

                                                <td><?php echo $p['id']; ?></td>
                                                <td><?php echo utf8_decode($p['codigo']); ?></td>
                                                <td><?php echo utf8_decode($p['formato']); ?></td>
                                                <td><?php echo utf8_decode($p['espesor']); ?></td>
                                                <td><?php echo utf8_decode($p['m2_por_caja']); ?></td>
                                                <td><?php echo utf8_decode($categoria[$p['categoria']]); ?></td>
												<td><?php echo utf8_decode($estado); ?></td>
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





<?php //MODAL Cargar Producto ?>
<div class="modal fade" id="modalCargarProducto" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			    <h4 class="modal-title">Cargar Producto</h4>	
                <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/shop/murvi/alta_producto" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">							
								<div class="col-md-4">
									<h4>C&oacute;digo</h4>
									<input type="text" class="form-control codigo" name="codigo">
								</div>
								<div class="col-md-8">
									<h4>Detalle</h4>
									<input type="text" class="form-control" name="detalle">
								</div>
								
								<div class="col-md-4">
									<h4>Formato</h4>
                                    <input type="text" class="form-control" name="formato">
								</div>

                                <div class="col-md-4">
									<h4>Espesor</h4>
									<input type="text" class="form-control" name="espesor">
								</div>
                                <div class="col-md-4">
									<h4>Dimensi&oacute;n Hoja</h4>
									<input type="text" class="form-control" name="dimension_hoja">
								</div>
                                <div class="col-md-4">
									<h4>Peso</h4>
									<input type="text" class="form-control" name="peso">
								</div>
                                <div class="col-md-4">
									<h4>M2 por caja</h4>
									<input type="text" class="form-control" name="m2_por_caja">
								</div>
                                <div class="col-md-4">
									<h4>Junta</h4>
									<input type="text" class="form-control" name="junta">
								</div>
                                <div class="col-md-4">
									<h4>Color</h4>
									<input type="text" class="form-control" name="color">
								</div>
								<div class="col-md-4">
									<h4>Categor&iacute;a</h4>
                                    <select class="form-control" name="categoria">
                                        <option value="1">Colores</option>
                                        <option value="2">Degrade</option>
										<option value="3">Guardas</option>
										<option value="4">Mezclas</option>
                                    </select>
								</div>
                                <div class="col-md-4">
									<h4>Estado</h4>
                                    <select class="form-control" name="estado">
                                        <option value="1">Disponible</option>
                                        <option value="0">No disponible</option>
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



<?php //MODAL Cargar Producto ?>
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			    <h4 class="modal-title">Editar Producto</h4>	
                <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/shop/murvi/modificacion_producto" method="POST" enctype="multipart/form-data">
					<div class="panel">
						<div class="panel-body">
							<div class="row">							
								<div class="col-md-4">
									<h4>C&oacute;digo</h4>

									<input type="hidden" class="form-control id" name="id" id="mp_id">

									<input type="text" class="form-control codigo" name="codigo" id="mp_codigo">
								</div>

								<div class="col-md-12">
									<h4>Detalle</h4>
                                    <input type="text" class="form-control" name="detalle" id="mp_detalle">
								</div>
								
								<div class="col-md-12">
									<h4>Formato</h4>
                                    <input type="text" class="form-control" name="formato" id="mp_formato">
								</div>

                                <div class="col-md-4">
									<h4>Espesor</h4>
									<input type="text" class="form-control" name="espesor" id="mp_espesor">
								</div>
                                <div class="col-md-4">
									<h4>Dimensi&oacute;n Hoja</h4>
									<input type="text" class="form-control" name="dimension_hoja" id="mp_dimension_hoja">
								</div>
                                <div class="col-md-4">
									<h4>Peso</h4>
									<input type="text" class="form-control" name="peso" id="mp_peso">
								</div>
                                <div class="col-md-4">
									<h4>M2 por caja</h4>
									<input type="text" class="form-control" name="m2_por_caja" id="mp_m2_por_caja">
								</div>
                                <div class="col-md-4">
									<h4>Junta</h4>
									<input type="text" class="form-control" name="junta" id="mp_junta">
								</div>
                                <div class="col-md-4">
									<h4>Color</h4>
									<input type="text" class="form-control" name="color" id="mp_color">
								</div>
								<div class="col-md-4">
									<h4>Categor&iacute;a</h4>
                                    <select class="form-control" name="categoria"  id="mp_categoria">
                                        <option value="1">Colores</option>
                                        <option value="2">Degrade</option>
										<option value="3">Guardas</option>
										<option value="4">Mezclas</option>
                                    </select>
								</div>
                                <div class="col-md-4">
									<h4>Estado</h4>
                                    <select class="form-control" name="estado" id="mp_estado">
                                        <option value="1">Disponible</option>
                                        <option value="0">No disponible</option>
                                    </select>
								</div>
                               
							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<a href="#" id="btn_borrar" class="btn btn-sm btn-danger btn-borrar">Borrar Producto</a>
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
			  <h4 class="modal-title">Galer&iacute;a de Imagenes</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="disable_on_submit form" action="<?php echo base_url(); ?>admin/shop/murvi/modificacion_imagenes" method="POST" enctype="multipart/form-data">
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



