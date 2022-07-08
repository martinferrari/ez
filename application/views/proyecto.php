<?php $titulo_pagina = ($idioma == 'es') ? ES_PROYECTOS : EN_PROYECTOS; ?>

<!-- subheader -->
<div class="proyectos">
<section id="subheader"  data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $titulo_pagina; ?></h1>
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

            <?php 
            $titulo = $proyecto['titulo'];
            if($idioma == 'en' && $proyecto['trad_titulo']):
                $titulo = $proyecto['trad_titulo'];
            endif;

            $descripcion = $proyecto['descripcion'];
            if($idioma == 'en' && $proyecto['trad_descripcion']):
                $descripcion = $proyecto['trad_descripcion'];
            endif;
            ?>


            <div class="col-sm-6 mt20 wow fadeInRight contenido" data-wow-delay=".5s">
                <h3 class="id-color" ><?php echo $titulo; ?></h3>
                <h4 class="id-color" ><?php echo $proyecto['anio_proyecto']; ?></h4>
                <p style="padding-right: 3em"><?php echo $descripcion; ?></p> 
                
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
                            $proyecto_label = ($idioma == "es") ? ES_PROYECTO : EN_PROYECTO;
                            $proyecto = '<li><i class="fas fa-drafting-compass"></i><strong>  '.$proyecto_label.': </strong>'.$data_adicional['proyecto'].'  </li>'; 
                        endif;
                        if($data_adicional['ejecucion'] != ''):
                            $ejecucion_label = ($idioma == "es") ? ES_EJECUCION : EN_EJECUCION;
                            $ejecucion = '<li><i class="fas fa-hard-hat"></i><strong>  '.$ejecucion_label.': </strong>'.$data_adicional['ejecucion'].'  </li>'; 
                        endif;
                        if($data_adicional['construccion_direccion'] != ''):
                            $construccion_direccion_label = ($idioma == "es") ? ES_DIR_CONSTRUC : EN_DIR_CONSTRUC;
                            $construccion_direccion = '<li><i class="fas fa-compass"></i></i><strong>  '.$construccion_direccion_label.': </strong>'.$data_adicional['construccion_direccion'].'  </li>'; 
                        endif;
                        if($data_adicional['disenio_dim_estruc'] != ''):
                            $disenio_dim_estruc_label = ($idioma == "es") ? ES_DIS_DIM_EST : EN_DIS_DIM_EST;
                            $disenio_dim_estruc = '<li><i class="fas fa-pencil-ruler"></i><strong>  '.$disenio_dim_estruc_label.': </strong>'.$data_adicional['disenio_dim_estruc'].'  </li>'; 
                        endif;
                        if($data_adicional['tipologia'] != ''):
                            $tipologia_label = ($idioma == "es") ? ES_TIPOLOGIA : EN_TIPOLOGIA;
                            $tipologia = '<li><i class="fas fa-hard-hat"></i><strong>  '.$tipologia_label.': </strong>'.$data_adicional['tipologia'].'  </li>'; 
                        endif;
                        if($data_adicional['disenio_dim_clim'] != ''):
                            $disenio_dim_clim_label = ($idioma == "es") ? ES_DIS_DIM_CLI : EN_DIS_DIM_CLI;
                            $disenio_dim_clim = '<li><i class="fas fa-wind"></i><strong>  '.$disenio_dim_clim_label.': </strong>'.$data_adicional['disenio_dim_clim'].'  </li>'; 
                        endif;
                        if($data_adicional['area'] != ''):
                            $area_label = ($idioma == "es") ? ES_AREA : EN_AREA;
                            $area = '<li><i class="fas fa-ruler-combined"></i><strong>  '.$area_label.': </strong>'.$data_adicional['area'].'  </li>'; 
                        endif;


                        if($data_adicional['direccion_tecnica'] != ''):
                            $direccion_tecnica_label = ($idioma == "es") ? ES_DIR_TECNICA : EN_DIR_TECNICA;
                            $direccion_tecnica = '<li><i class="fas fa-hard-hat"></i><strong>  '.$direccion_tecnica_label.': </strong>'.$data_adicional['direccion_tecnica'].'  </li>'; 
                        endif;
                        if($data_adicional['asist_tec_obra'] != ''):
                            $asist_tec_obra_label = ($idioma == "es") ? ES_ASIST_TECT_OBRA : EN_ASIST_TECT_OBRA;
                            $asist_tec_obra = '<li><i class="fas fa-user"></i><strong>  '.$asist_tec_obra_label.': </strong>'.$data_adicional['asist_tec_obra'].'  </li>';
                        endif;
                        if($data_adicional['estructuras'] != ''):
                            $estructuras_label = ($idioma == "es") ? ES_ESTRUCTURAS : EN_ESTRUCTURAS;
                            $estructuras = '<li><i class="fas fa-building"></i><strong>  '.$estructuras_label.' :</strong>'.$data_adicional['estructuras'].'  </li>';
                        endif;
                        if($data_adicional['instalaciones'] != ''):
                            $instalaciones_label = ($idioma == "es") ? ES_INSTALACIONES : EN_INSTALACIONES;
                            $instalaciones = '<li><i class="fas fa-broadcast-tower"></i><strong>  '.$instalaciones_label.': </strong>'.$data_adicional['instalaciones'].'  </li>';
                        endif;
                        if($data_adicional['gestion_documentacion'] != ''):
                            $gestion_documentacion_label = ($idioma == "es") ? ES_GEST_DOCUMENTACION : EN_GEST_DOCUMENTACION;
                            $gestion_documentacion = '<li><i class="fas fa-file-invoice"></i><strong>   '.$gestion_documentacion_label.': </strong>'.$data_adicional['gestion_documentacion'].'  </li>';
                        endif;
                        if($data_adicional['sup_terreno'] != ''):
                            $sup_terreno_label = ($idioma == "es") ? ES_SUP_TERRENO : EN_SUP_TERRENO;
                            $sup_terreno = '<li><i class="fas fa-ruler-combined"></i><strong>   '.$sup_terreno_label.': </strong>'.$data_adicional['sup_terreno'].'  </li>';
                        endif;
                        if($data_adicional['sup_cubierta'] != ''):
                            $sup_cubierta_label = ($idioma == "es") ? ES_SUP_CUBIERTA : EN_SUP_CUBIERTA;
                            $sup_cubierta = '<li><i class="fas fa-ruler-combined"></i><strong>   '.$sup_cubierta_label.': </strong>'.$data_adicional['sup_cubierta'].'  </li>';
                        endif;
                        if($data_adicional['ubicacion'] != ''):
                            $ubicacion_label = ($idioma == "es") ? ES_UBICACION : EN_UBICACION;
                            $ubicacion = '<li><i class="fas fa-map-marker-alt"></i><strong>   '.$ubicacion_label.': </strong>'.$data_adicional['ubicacion'].'  </li>';
                        endif;
                        if($data_adicional['anio_finalizacion'] != ''):
                            $anio_finalizacion_label = ($idioma == "es") ? ES_ANIO_FINALIZ : EN_ANIO_FINALIZ;
                            $anio_finalizacion = '<li><i class="fas fa-calendar-alt"></i><strong>   '.$anio_finalizacion_label.':</strong>'.$data_adicional['anio_finalizacion'].'  </li>';
                        endif;
                        if($data_adicional['fotografia'] != ''):
                            $fotografia_label = ($idioma == "es") ? ES_FOTOGRAFIA : EN_FOTOGRAFIA;
                            $fotografia = '<li><i class="fas fa-camera"></i><strong>   '.$fotografia_label.': </strong>'.$data_adicional['fotografia'].'  </li>';
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
        <?php if($idioma == "es"): 
                $contacto_label = "CONTACTO";
            else:
                $contacto_label = "CONTACT";
            endif;
            ?>
            <a href="<?php echo base_url(); ?>contacto" class="btn btn-line-black btn-big mt20 wow fadeInUp"><?php echo $contacto_label; ?></a>
        </div>
    </div>
</section> 