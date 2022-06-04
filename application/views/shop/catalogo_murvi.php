<!-- subheader -->
<div class="murvi">
<section id="subheader"  data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Mosaicos Murvi</h1>
            </div>
        </div>
    </div>
</section>
<!-- subheader -->


<section class="section-grids">

<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified">
  <li class="active"><a href="#colores" data-toggle="tab">Colores</a></li>
  <li><a href="#degrade" data-toggle="tab">Degrade</a></li>
  <li><a href="#guardas" data-toggle="tab">Guardas</a></li>
  <li><a href="#mezclas" data-toggle="tab">Mezclas</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

<div class="contenedor_productos_seleccionados">
    <span class="">Productos Seleccionados 
        <span class="label label-default qty_productos_seleccionados">0</span>
    </span>
    <a href="#" 
    class="btn btn-primary btn_solicitar_cotizacion" 
    data-toggle="modal" data-target="#modalCotizacion"
    >Solicitar Cotizaci&oacute;n</a>
</div>

    <div class="tab-pane active" id="colores">
    <div class="grid" data-col="3" data-gridspace="10" data-ratio="466/700">
        <?php foreach($productos as $producto): 
        if($producto['categoria'] == 1): ?>
            <div class="grid-sizer"></div>
            <div class="grid-item">
                <div class="campos_cotizacion">
                    <label>
                        <input
                            type="checkbox" 
                            class="productos" 
                            id="producto_<?php echo $producto['id']; ?>"
                            data-id="<?php echo $producto['id']; ?>"
                            data-codigo="<?php echo $producto['codigo']; ?>"
                            data-img="<?php echo $producto['path']; ?>"
                        > 
                        Seleccionar para cotizar
                    </label>
                    <select class="unidad_producto">
                        <option value="m2">m2</option>
                        <option value="ml">m lineal</option>
                    </select>
                    <input type="number" class="cantidad_producto">
                </div>

                <div class="item">
                    <div class="picframe">
                        <span class="overlay" >
                            <span class="pf_title">
                                <span class="project-name"><?php echo $producto['codigo']; ?></span>

                                <?php if($producto['formato'] != ""): ?>
                                <span class="project-name">Formato: <?php echo $producto['formato']; ?></span>
                                <?php endif; ?>

                                <?php if($producto['detalle'] != ""): ?>
                                <span class="project-name">Detalle: <?php echo $producto['detalle']; ?></span>
                                <?php endif; ?>

                            </span>
                        </span>
                        <img src="<?php echo base_url(); ?><?php echo $producto['path']; ?>" alt="EZ Estudio">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
  </div>


  <div class="tab-pane" id="degrade">
  <div class="grid" data-col="3" data-gridspace="10" data-ratio="466/700">
        <?php foreach($productos as $producto): 
        if($producto['categoria'] == 2): ?>
            <div class="grid-sizer"></div>
            <div class="grid-item">
                <div class="campos_cotizacion">
                    <label>
                        <input
                            type="checkbox" 
                            class="productos" 
                            id="producto_<?php echo $producto['id']; ?>"
                            data-id="<?php echo $producto['id']; ?>"
                            data-codigo="<?php echo $producto['codigo']; ?>"
                            data-img="<?php echo $producto['path']; ?>"
                        > 
                        Seleccionar para cotizar
                    </label>
                    <select class="unidad_producto">
                        <option value="m2">m2</option>
                        <option value="ml">m lineal</option>
                    </select>
                    <input type="number" class="cantidad_producto">
                </div>
                <div class="item">
                    <div class="picframe">
                        <span class="overlay" >
                            <span class="pf_title">
                                <span class="project-name"><?php echo $producto['codigo']; ?></span>

                                <?php if($producto['formato'] != ""): ?>
                                <span class="project-name">Formato: <?php echo $producto['formato']; ?></span>
                                <?php endif; ?>

                                <?php if($producto['espesor'] != ""): ?>
                                <span class="project-name">Espesor: <?php echo $producto['espesor']; ?></span>
                                <?php endif; ?>
                            </span>
                        </span>
                        <img src="<?php echo base_url(); ?><?php echo $producto['path']; ?>" alt="EZ Estudio">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
  </div>


  <div class="tab-pane" id="guardas">
  <div class="grid" data-col="3" data-gridspace="10" data-ratio="466/700">
        <?php foreach($productos as $producto): 
        if($producto['categoria'] == 3): ?>
            <div class="grid-sizer"></div>
            <div class="grid-item">
                <div class="campos_cotizacion">
                    <label>
                        <input
                            type="checkbox" 
                            class="productos" 
                            id="producto_<?php echo $producto['id']; ?>"
                            data-id="<?php echo $producto['id']; ?>"
                            data-codigo="<?php echo $producto['codigo']; ?>"
                            data-img="<?php echo $producto['path']; ?>"
                        > 
                        Seleccionar para cotizar
                    </label>
                    <select class="unidad_producto">
                        <option value="m2">m2</option>
                        <option value="ml">m lineal</option>
                    </select>
                    <input type="number" class="cantidad_producto">
                </div>

                <div class="item">
                    <div class="picframe">
                        <span class="overlay" >
                            <span class="pf_title">
                                <span class="project-name"><?php echo $producto['codigo']; ?></span>

                                <?php if($producto['formato'] != ""): ?>
                                <span class="project-name">Formato: <?php echo $producto['formato']; ?></span>
                                <?php endif; ?>

                                <?php if($producto['espesor'] != ""): ?>
                                <span class="project-name">Espesor: <?php echo $producto['espesor']; ?></span>
                                <?php endif; ?>
                            </span>
                        </span>
                        <img src="<?php echo base_url(); ?><?php echo $producto['path']; ?>" alt="EZ Estudio">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
  </div>


  <div class="tab-pane" id="mezclas">
  <div class="grid" data-col="3" data-gridspace="10" data-ratio="466/700">
        <?php foreach($productos as $producto): 
        if($producto['categoria'] == 4): ?>
            <div class="grid-sizer"></div>
            <div class="grid-item">
                <div class="campos_cotizacion">
                    <label>
                        <input
                            type="checkbox" 
                            class="productos" 
                            id="producto_<?php echo $producto['id']; ?>"
                            data-id="<?php echo $producto['id']; ?>"
                            data-codigo="<?php echo $producto['codigo']; ?>"
                            data-img="<?php echo $producto['path']; ?>"
                        > 
                        Seleccionar para cotizar
                    </label>
                    <select class="unidad_producto">
                        <option value="m2">m2</option>
                        <option value="ml">m lineal</option>
                    </select>
                    <input type="number" class="cantidad_producto">
                </div>

                <div class="item">
                    <div class="picframe">
                        <span class="overlay" >
                            <span class="pf_title">
                                <span class="project-name"><?php echo $producto['codigo']; ?></span>

                                <?php if($producto['formato'] != ""): ?>
                                <span class="project-name">Formato: <?php echo $producto['formato']; ?></span>
                                <?php endif; ?>

                                <?php if($producto['espesor'] != ""): ?>
                                <span class="project-name">Espesor: <?php echo $producto['espesor']; ?></span>
                                <?php endif; ?>
                            </span>
                        </span>
                        <img src="<?php echo base_url(); ?><?php echo $producto['path']; ?>" alt="EZ Estudio">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
  </div>

</div>





<div class="modal fade" id="modalCotizacion" tabindex="-1" role="dialog">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			  <h4 class="modal-title">Solicitar Cotizaci&oacute;n</h4>	
        		
			</div>
			<div class="modal-body">				
				<form class="" action="<?php echo base_url(); ?>shop/murvi/solicitar_cotizacion" method="POST" id="form_cotizacion">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
                            <h4>Datos Personales</h4>
                                <div class="form-group">
                                    <label for="inputName">Nombre y Apellido</label>
                                    <input type="text" class="form-control" id="inputName" name='inputName' placeholder="Ingresa nombre y Apellido" />
                                    <label for="inputName">Telefono</label>
                                    <input type="number" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="Ingresa Telefono" />
                                    <label for="inputEmail">Email</label>
                                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" />
                                </div>
                                
                                <h4>Productos seleccionados</h4>
                                <div class="form-group" id="mc_productos_seleccionados">
                                
                                </div>
                                <input type="hidden" id="wa_productos">
							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<button type="button" id="" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button 
                            type="submit" 
                            class="btn btn-sm btn-primary"
                            id="btn_cotizacion_email"
                        >Solicitar Cotizaci&oacute;n por email</button>
                        <a href="#" 
                            id="btn_wa" 
                            class="btn btn-sm btn-primary"
                        >Soliticar Cotizaci&oacute;n por WhatsApp</a>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>




</section>