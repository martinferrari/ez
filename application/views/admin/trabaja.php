<?php  header('Content-type: text/html; charset=ISO-8859-1'); ?> 

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Contacto | Trabaja con nosotros</h3>
			
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
                                        <th>Profesión</th>
										<th>Posee Título</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($trabaja as $t): ?>
											
                                            <tr>
                                                <input type="hidden" class="id" 
                                                value="<?php echo $t['id']; ?>">
                                                <input type="hidden" class="nombre" 
                                                value="<?php echo utf8_decode($t['nombre']); ?>">
                                                <input type="hidden" class="dni" 
                                                value="<?php echo $t['dni']; ?>">
                                                <input type="hidden" class="fecha_nac" 
                                                value="<?php echo utf8_decode($t['fecha_nac']); ?>">
                                                <input type="hidden" class="lugar_nac" 
                                                value="<?php echo $t['lugar_nac']; ?>">
                                                <input type="hidden" class="direccion" 
                                                value="<?php echo utf8_decode($t['direccion']); ?>">
                                                <input type="hidden" class="estado_civil" 
                                                value="<?php echo $t['estado_civil']; ?>">
                                                <input type="hidden" class="hijos" 
                                                value="<?php echo $t['hijos']; ?>">
                                                <input type="hidden" class="telefono" 
                                                value="<?php echo $t['telefono']; ?>">
                                                <input type="hidden" class="profesion" 
                                                value="<?php echo utf8_decode($t['profesion']); ?>">
                                                <input type="hidden" class="entidad_titulo" 
                                                value="<?php echo utf8_decode($t['entidad_titulo']); ?>">
                                                <input type="hidden" class="email" 
                                                value="<?php echo $t['email']; ?>">
                                                <input type="hidden" class="primer_trabajo" 
                                                value="<?php echo $t['primer_trabajo']; ?>">
                                                <input type="hidden" class="trabajo_anterior" 
                                                value="<?php echo utf8_decode($t['trabajo_anterior']); ?>">
                                                <input type="hidden" class="posee_titulo_uni" 
                                                value="<?php echo $t['posee_titulo_uni']; ?>">
                                                <input type="hidden" class="posee_matricula" 
                                                value="<?php echo $t['posee_matricula']; ?>">
                                                <input type="hidden" class="posee_movilidad" 
                                                value="<?php echo $t['posee_movilidad']; ?>">
                                                <input type="hidden" class="posee_lic_conducir" 
                                                value="<?php echo $t['posee_lic_conducir']; ?>">
                                                <input type="hidden" class="tipo_medio" 
                                                value="<?php echo $t['tipo_medio']; ?>">
                                                <input type="hidden" class="tipo_licencia" 
                                                value="<?php echo utf8_decode($t['tipo_licencia']); ?>">
                                                <input type="hidden" class="dispo_horaria" 
                                                value="<?php echo utf8_decode($t['dispo_horaria']); ?>">
                                                <input type="hidden" class="conoce_estudio" 
                                                value="<?php echo utf8_decode($t['conoce_estudio']); ?>">
                                                <input type="hidden" class="conoce_obras" 
                                                value="<?php echo utf8_decode($t['conoce_obras']); ?>">
                                                <input type="hidden" class="obra_ident" 
                                                value="<?php echo utf8_decode($t['obra_ident']); ?>">
                                                <input type="hidden" class="como_informo_vacante" 
                                                value="<?php echo utf8_decode($t['como_informo_vacante']); ?>">
                                                <input type="hidden" class="sigue_face" 
                                                value="<?php echo $t['sigue_face']; ?>">
                                                <input type="hidden" class="sigue_insta" 
                                                value="<?php echo $t['sigue_insta']; ?>">
                                                <input type="hidden" class="face" 
                                                value="<?php echo utf8_decode($t['face']); ?>">
                                                <input type="hidden" class="insta" 
                                                value="<?php echo utf8_decode($t['insta']); ?>">
                                               
                                                

                                                <td><?php echo $t['id']; ?></td>
                                                <td><?php echo utf8_decode($t['nombre']); ?></td>
                                                <td><?php echo utf8_decode($t['email']); ?></td>
                                                <td><?php echo utf8_decode($t['profesion']); ?></td>
												<td><?php echo utf8_decode($t['posee_titulo_uni']); ?></td>
                                                <td>
													
                                                    <a 
                                                        class="acciones" 
                                                        href="#" 
                                                        data-accion="detalle" 
                                                        data-toggle="modal" 
                                                        data-target="#modalDetalle">
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
<div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h3>Datos personales</h3>
                                </div>
								<div class="col-md-6">
									<h4>Nombre y apellido</h4>
									<p id="nombre"></p>
								</div>
                                <div class="col-md-6">
									<h4>DNI</h4>
									<p id="dni"></p>
								</div>
                                <div class="col-md-6">
									<h4>Fecha de Nacimiento</h4>
									<p id="fecha_nac"></p>
								</div>
                                <div class="col-md-6">
									<h4>Lugar de Nacimiento</h4>
									<p id="lugar_nac"></p>
								</div>
                                <div class="col-md-12">
									<h4>Dirección</h4>
									<p id="direccion"></p>
								</div>
                                <div class="col-md-6">
									<h4>Estado Civil</h4>
									<p id="estado_civil"></p>
								</div>
                                <div class="col-md-6">
									<h4>Hijos</h4>
									<p id="hijos"></p>
								</div>
                                <div class="col-md-6">
									<h4>Telefono</h4>
									<p id="telefono"></p>
								</div>
                                <div class="col-md-6">
									<h4>Email</h4>
									<p id="email"></p>
								</div>
                                <div class="col-md-6">
									<h4>Profesión</h4>
									<p id="profesion"></p>
								</div>
                                <div class="col-md-6">
									<h4>Posee título universitario</h4>
									<p id="posee_titulo_uni"></p>
								</div>
                                <div class="col-md-6">
									<h4>Entidad que otorga el Título</h4>
									<p id="entidad_titulo"></p>
								</div>

                                <div class="col-md-12">
                                    <h3>Datos Laborales</h3>
                                </div>

                                <div class="col-md-4">
									<h4>Es su primer trabajo?</h4>
									<p id="primer_trabajo"></p>
								</div>
                                <div class="col-md-8">
									<h4>Trabajo anterior</h4>
									<p id="trabajo_anterior"></p>
								</div>
                                <div class="col-md-4">
									<h4>Posee Matrícula</h4>
									<p id="posee_matricula"></p>
								</div>
                                <div class="col-md-4">
									<h4>Posee movilidad</h4>
									<p id="posee_movilidad"></p>
								</div>
                                <div class="col-md-4">
									<h4>Posee Licencia de conducir</h4>
									<p id="posee_lic_conducir"></p>
								</div>

                                <div class="col-md-4">
									<h4>Tipo de medio</h4>
									<p id="tipo_medio"></p>
								</div>
                                <div class="col-md-4">
									<h4>Tipo de licencia</h4>
									<p id="tipo_licencia"></p>
								</div>
                                <div class="col-md-4">
									<h4>Disponibilidad horaria</h4>
									<p id="dispo_horaria"></p>
								</div>
                                <div class="col-md-4">
									<h4>Conoce el estudio?</h4>
									<p id="conoce_estudio"></p>
								</div>
                                <div class="col-md-4">
									<h4>Conoce obras?</h4>
									<p id="conoce_obras"></p>
								</div>
                                <div class="col-md-4">
									<h4>Obra identificada</h4>
									<p id="obra_ident"></p>
								</div>
                                <div class="col-md-4">
									<h4>Como se informo de la vacante</h4>
									<p id="como_informo_vacante"></p>
								</div>
                                <div class="col-md-4">
									<h4>Sigue Facebook?</h4>
									<p id="sigue_face"></p>
								</div>
                                <div class="col-md-4">
									<h4>Sigue Instagram</h4>
									<p id="sigue_insta"></p>
								</div>
                                <div class="col-md-6">
									<h4>ID Facebook</h4>
									<p id="face"></p>
								</div>
                                <div class="col-md-6">
									<h4>id Instagram</h4>
									<p id="insta"></p>
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