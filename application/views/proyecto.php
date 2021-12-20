<!-- subheader -->
<div class="proyectos">


<section id="subheader"  data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Proyectos</h1>
            </div>
        </div>
    </div>
</section>
<!-- subheader -->  
<!-- content begin -->
 <div id="content" class="no-top no-bottom">

     <!-- VISIBLE PC TABLET -->
     <div class="hidden-xs1">
        <div class="row ">
            <div class="col-sm-6"> 
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <?php /*<ol class="carousel-indicators">
                        <li data-target="myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="myCarousel" data-slide-to="1"></li>
                        <li data-target="myCarousel" data-slide-to="2"></li>
                        <li data-target="myCarousel" data-slide-to="3"></li>
                        <li data-target="myCarousel" data-slide-to="4"></li>
                    </ol> */ ?>
                    
                    <div class="carousel-inner" role="listbox">
                        <?php  
                        if(isset($imagenes)):
                            $qty = count($imagenes);
                            $qty_hasta = ($qty>=5) ? 5 : $qty;

                            for($i=0; $i<$qty_hasta;$i++): 
                                $active = ($i == 0) ? "active" : "";
                            ?>
                                <div class="item <?php echo $active;?>">
                                    <img src="<?php echo base_url().$imagenes[$i]; ?>" alt="" />
                                </div>
                        <?php 
                            endfor; 
                        endif;
                        ?>
                    </div>
                </div>                                  
            </div>

            <div class="col-sm-6 mt40 wow fadeInRight contenido" data-wow-delay=".5s">
                <h3 class="id-color" ><?php echo utf8_decode($proyecto['titulo']); ?></h3>
                <h4 class="id-color" ><?php echo utf8_decode($proyecto['anio_proyecto']); ?></h4>
                <p style="padding-right: 3em"><?php echo utf8_decode($proyecto['descripcion']); ?></p> 
                
            </div>
        </div>

        <?php //CARROUSEL ABAJO ?>
        <?php $q = count($imagenes); 
        if($q > 5): ?>
            <div class="owl-custom-nav">
                <a class="btn-next"></a>
                <a class="btn-prev"></a>
            </div>

            <div id="gallery-carousel-4" class="owl-slide zoom-gallery zoom-gallery" data-wow-delay=".2s">                                            
                <?php for($i=5; $i<$q;$i++):   ?>
                    <div class='carousel-item'>
                        <div class='picframe'>
                            <a href='<?php echo base_url().$imagenes[$i]; ?>' alt=''/>
                                <img src='<?php echo base_url().$imagenes[$i]; ?>' alt='' />
                            </a>
                        </div>
                    </div>
                <?php  endfor; ?>
            </div>
        <?php endif; ?>
        <?php //   CARROUSEL ABAJO ?>
             
        <?php if($hay_datos_adicionales > 0): ?>

            <div class="row">

                <div class="col-sm-6">
                    <img src="<?php echo base_url().$destacada; ?>" width="100%"  alt="proyecto Casa CC" />
                </div>
                <div class="col-sm-6 mt40">
                    
                    <p><strong>Proyecto Coordinación General</strong></p>
                    <ul style="list-style:none;">
                        <?php 
                        $proyecto = '';
                        $ejecucion = '';
                        $construccion_direccion = '';
                        $disenio_dim_estruc = '';
                        $tipologia = '';
                        $disenio_dim_clim = '';
                        $area = '';

                        $direccion_tecnica = '';
                        $asist_tec_obra = '';
                        $estructuras = '';
                        $instalaciones = '';
                        $gestion_documentacion = '';
                        $sup_terreno = '';
                        $sup_cubierta = '';
                        $ubicacion = '';
                        $anio_finalizacion = '';
                        $fotografia = '';

                        if($data_adicional['proyecto'] != ''):
                            $proyecto = '<li><i class="fas fa-drafting-compass"></i><strong>  Proyecto: </strong>'.utf8_decode($data_adicional['proyecto']).'  </li>'; 
                        endif;
                        if($data_adicional['ejecucion'] != ''):
                            $ejecucion = '<li><i class="fas fa-hard-hat"></i><strong>  Ejecución: </strong>'.utf8_decode($data_adicional['ejecucion']).'  </li>'; 
                        endif;
                        if($data_adicional['construccion_direccion'] != ''):
                            $construccion_direccion = '<li><i class="fas fa-compass"></i></i><strong>  Dirección de la Construcción: </strong>'.utf8_decode($data_adicional['construccion_direccion']).'  </li>'; 
                        endif;
                        if($data_adicional['disenio_dim_estruc'] != ''):
                            $disenio_dim_estruc = '<li><i class="fas fa-pencil-ruler"></i><strong>  Diseño y Dimensionado Estructural: </strong>'.utf8_decode($data_adicional['disenio_dim_estruc']).'  </li>'; 
                        endif;
                        if($data_adicional['tipologia'] != ''):
                            $tipologia = '<li><i class="fas fa-hard-hat"></i><strong>  Tipología: </strong>'.utf8_decode($data_adicional['tipologia']).'  </li>'; 
                        endif;
                        if($data_adicional['disenio_dim_clim'] != ''):
                            $disenio_dim_clim = '<li><i class="fas fa-wind"></i><strong>  Diseño y Dimensionado de Climatización: </strong>'.utf8_decode($data_adicional['disenio_dim_clim']).'  </li>'; 
                        endif;
                        if($data_adicional['area'] != ''):
                            $area = '<li><i class="fas fa-ruler-combined"></i><strong>  Area: </strong>'.utf8_decode($data_adicional['area']).'  </li>'; 
                        endif;


                        if($data_adicional['direccion_tecnica'] != ''):
                            $direccion_tecnica = '<li><i class="fas fa-hard-hat"></i><strong>  Dirección Técnica: </strong>'.utf8_decode($data_adicional['direccion_tecnica']).'  </li>'; 
                        endif;
                        if($data_adicional['asist_tec_obra'] != ''):
                            $asist_tec_obra = '<li><i class="fas fa-user"></i><strong>  Asistencia Técnica en proyecto: </strong>'.utf8_decode($data_adicional['asist_tec_obra']).'  </li>';
                        endif;
                        if($data_adicional['estructuras'] != ''):
                            $estructuras = '<li><i class="fas fa-building"></i><strong>  Estructuras :</strong>'.utf8_decode($data_adicional['estructuras']).'  </li>';
                        endif;
                        if($data_adicional['instalaciones'] != ''):
                            $instalaciones = '<li><i class="fas fa-broadcast-tower"></i><strong>  Instalaciones: </strong>'.utf8_decode($data_adicional['instalaciones']).'  </li>';
                        endif;
                        if($data_adicional['gestion_documentacion'] != ''):
                            $gestion_documentacion = '<li><i class="fas fa-file-invoice"></i><strong>   Gestión de Documentación: </strong>'.utf8_decode($data_adicional['gestion_documentacion']).'  </li>';
                        endif;
                        if($data_adicional['sup_terreno'] != ''):
                            $sup_terreno = '<li><i class="fas fa-ruler-combined"></i><strong>   Superficie del Terreno: </strong>'.utf8_decode($data_adicional['sup_terreno']).'  </li>';
                        endif;
                        if($data_adicional['sup_cubierta'] != ''):
                            $sup_cubierta = '<li><i class="fas fa-ruler-combined"></i><strong>   Superficie Cubierta: </strong>'.utf8_decode($data_adicional['sup_cubierta']).'  </li>';
                        endif;
                        if($data_adicional['ubicacion'] != ''):
                            $ubicacion = '<li><i class="fas fa-map-marker-alt"></i><strong>   Ubicación: </strong>'.utf8_decode($data_adicional['ubicacion']).'  </li>';
                        endif;
                        if($data_adicional['anio_finalizacion'] != ''):
                            $anio_finalizacion = '<li><i class="fas fa-calendar-alt"></i><strong>   Ubicación:</strong>'.utf8_decode($data_adicional['anio_finalizacion']).'  </li>';
                        endif;
                        if($data_adicional['fotografia'] != ''):
                            $fotografia = '<li><i class="fas fa-camera"></i><strong>   Fotografia: </strong>'.utf8_decode($data_adicional['fotografia']).'  </li>';
                        endif;
                        
                        echo $proyecto;
                        echo $ejecucion;
                        echo $construccion_direccion;
                        echo $disenio_dim_estruc;
                        echo $tipologia;
                        echo $disenio_dim_clim;
                        echo $area;
                        echo $direccion_tecnica;
                        echo $asist_tec_obra; 
                        echo $estructuras; 
                        echo $instalaciones; 
                        echo $gestion_documentacion;
                        echo $sup_terreno;
                        echo $sup_cubierta;
                        echo $ubicacion;
                        echo $anio_finalizacion;
                        echo $fotografia;
                        ?>
                        
                    </ul>  
                  </div>
              </div>
              
              
              <!-- 16:9 aspect ratio vVIDEO -->
              <div class="embed-responsive embed-responsive-16by9">
                <?php if(isset($videos[0])): ?>
                    <video controls loop playsinline muted class="embed-responsive-item" style="max-width:100%; height:auto mt20">
                        <source src="<?php echo base_url().$videos[0]; ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
            </div> 
            <?php endif; ?>
             
        </div>
</div>
</div>


<section id="view-all-projects" class="call-to-action bg-color text-center text-dark padding20" data-speed="5" data-type="background" aria-label="cta">
    <div class="container">
        <div class="row">         
                <a href="<?php echo base_url(); ?>contacto" class="btn btn-line-black btn-big mt20 wow fadeInUp">CONTACTO</a>
        </div>
    </div>
</section> 