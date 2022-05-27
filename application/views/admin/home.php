<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Home</h3>
			
        </div>
        <div class="title_right">
			<div class="input-group">
				
			</div>
        </div>
		
		<div style="clear:both"></div>
	</div>
    <div style="clear:both"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cantidad_obras[0]['cantidad'] ; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Obras Publicadas</h6>
                                    <a href="obras" class="card-link">Administrar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" >
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cantidad_proyectos[0]['cantidad'] ; ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Proyectos Publicados</h6>
                                        <a href="proyectos" class="card-link">Administrar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" >
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cantidad_novedades[0]['cantidad'] ; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Novedades Publicadas</h6>
                                    <a href="novedades" class="card-link">Administrar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" >
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cantidad_nosotros[0]['cantidad'] ; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Personas del Equipo</h6>
                                     <a href="nosotros" class="card-link">Administrar</a>
                                </div>
                            </div>
                        </div>
                    </div> <?php //row ?>
                </div> <?php //x_content ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Configuraci&oacute;n Home</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <article class="media event configuracion">
                                        <div class="media-body">
                                            <h4>Posts en p&aacute;gina</h4>
                                            <form method="POST" action="<?php echo base_url(); ?>admin/Obras/guardar_configuracion_home">
                                                                                      
                                            <?php $ch = $conf_home['cantidad']['valor']; ?>
                                            <?php $oh = $conf_home['orden']['valor']; ?>
                                       
                                                <select class="form-control" name="cant_home">
                                                    <option value="10" <?php echo $s = ($ch == '10') ? "selected" : ""; ?>>10</option>
                                                    <option value="16" <?php echo $s = ($ch == '16') ? "selected" : ""; ?>>16</option>
                                                    <option value="20" <?php echo $s = ($ch == '20') ? "selected" : ""; ?>>20</option>
                                                </select>

                                                <h4>Orden</h4>
                                                <select class="form-control" name="orden_home">
                                                    <option value="id desc" <?php echo $s = ($oh == 'id desc') ? "selected" : ""; ?>>Ultimo primero</option>
                                                    <option value="rand()" <?php echo $s = ($oh == 'rand()') ? "selected" : ""; ?>>Aleatorio</option>
                                                    <option value="titulo asc" <?php echo $s = ($oh == 'titulo asc') ? "selected" : ""; ?>>Por nombre</option>
                                                </select>

                                                <input type="submit" class="btn btn-sm btn-primary" value="Guardar">
                                            </form>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Configuraci&oacute;n Obras</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <article class="media event configuracion">
                                        <div class="media-body">
                                            <h4>Obras en p&aacute;gina</h4>
                                            <form method="POST" action="<?php echo base_url(); ?>admin/Obras/guardar_configuracion">
                                                                                      
                                            <?php $co = $conf_obras['cantidad']['valor']; ?>
                                            <?php $oo = $conf_obras['orden']['valor']; ?>
                                       
                                                <select class="form-control" name="cant_obras">
                                                    <option value="10" <?php echo $s = ($co == '10') ? "selected" : ""; ?>>10</option>
                                                    <option value="16" <?php echo $s = ($co == '16') ? "selected" : ""; ?>>16</option>
                                                    <option value="20" <?php echo $s = ($co == '20') ? "selected" : ""; ?>>20</option>
                                                </select>

                                                <h4>Orden</h4>
                                                <select class="form-control" name="orden_obras">
                                                    <option value="id desc" <?php echo $s = ($oo == 'id desc') ? "selected" : ""; ?>>Ultimo primero</option>
                                                    <option value="rand()" <?php echo $s = ($oo == 'rand()') ? "selected" : ""; ?>>Aleatorio</option>
                                                    <option value="titulo asc" <?php echo $s = ($oo == 'titulo asc') ? "selected" : ""; ?>>Por nombre</option>
                                                </select>

                                                <input type="submit" class="btn btn-sm btn-primary" value="Guardar">
                                            </form>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Configuraci&oacute;n Proyectos</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <article class="media event configuracion">
                                        <div class="media-body">
                                            <h4>Proyectos en p&aacute;gina</h4>
                                            <form method="POST" action="<?php echo base_url(); ?>admin/Proyectos/guardar_configuracion">
                                                                                      
                                            <?php $cp = $conf_proyectos['cantidad']['valor']; ?>
                                            <?php $op = $conf_proyectos['orden']['valor']; ?>
                                                <select class="form-control" name="cant_proyectos">
                                                    <option value="10" <?php echo $s = ($cp == '10') ? "selected" : ""; ?>>10</option>
                                                    <option value="16" <?php echo $s = ($cp == '16') ? "selected" : ""; ?>>16</option>
                                                    <option value="20" <?php echo $s = ($cp == '20') ? "selected" : ""; ?>>20</option>
                                                </select>

                                                <h4>Orden</h4>
                                                <select class="form-control" name="orden_proyectos">
                                                    <option value="id desc" <?php echo $s = ($op == 'id desc') ? "selected" : ""; ?>>Ultimo primero</option>
                                                    <option value="rand()" <?php echo $s = ($op == 'rand()') ? "selected" : ""; ?>>Aleatorio</option>
                                                    <option value="titulo asc" <?php echo $s = ($op == 'titulo asc') ? "selected" : ""; ?>>Por nombre</option>
                                                </select>

                                                <input type="submit" class="btn btn-sm btn-primary" value="Guardar">
                                            </form>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Configuraci&oacute;n Novedades</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <article class="media event configuracion">
                                        <div class="media-body">
                                            <h4>Obras en p&aacute;gina</h4>
                                            <form method="POST" action="<?php echo base_url(); ?>admin/Novedades/guardar_configuracion">
                                                                                      
                                            <?php $cn = $conf_novedades['cantidad']['valor']; ?>
                                            <?php $on = $conf_novedades['orden']['valor']; ?>
                                                <select class="form-control" name="cant_novedades">
                                                    <option value="10" <?php echo $s = ($cn == '10') ? "selected" : ""; ?>>10</option>
                                                    <option value="16" <?php echo $s = ($cn == '16') ? "selected" : ""; ?>>16</option>
                                                    <option value="20" <?php echo $s = ($cn == '20') ? "selected" : ""; ?>>20</option>
                                                </select>

                                                <h4>Orden</h4>
                                                <select class="form-control" name="orden_novedades">
                                                    <option value="id desc" <?php echo $s = ($on == 'id desc') ? "selected" : ""; ?>>Ultimo primero</option>
                                                    <option value="rand()" <?php echo $s = ($on == 'rand()') ? "selected" : ""; ?>>Aleatorio</option>
                                                    <option value="titulo asc" <?php echo $s = ($on == 'titulo asc') ? "selected" : ""; ?>>Por nombre</option>
                                                </select>

                                                <input type="submit" class="btn btn-sm btn-primary" value="Guardar">
                                            </form>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>