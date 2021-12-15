<!-- subheader -->
<div class="obras">
<section id="subheader"  data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Obras</h1>
            </div>
        </div>
    </div>
</section>
<!-- subheader -->  
<!-- content begin -->
 <div id="content" class="no-top no-bottom">

     <!-- VISIBLE PC TABLET -->
     <div class="hidden-xs1">
        <div class="row mbottom20">
            <div class="col-sm-6"> 
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <?php /*<ol class="carousel-indicators">
                        <li data-target="myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="myCarousel" data-slide-to="1"></li>
                        <li data-target="myCarousel" data-slide-to="2"></li>
                        <li data-target="myCarousel" data-slide-to="3"></li>
                        <li data-target="myCarousel" data-slide-to="4"></li>
                    </ol> 
                    */ ?>
                    
                    <div class="carousel-inner" role="listbox">
                        <?php  
                        if(isset($imagenes)):
                        for($i=0; $i<5;$i++): 
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
                <h3 class="id-color" ><?php echo utf8_decode($obra['titulo']); ?></h3>
                <h4 class="id-color" ><?php echo utf8_decode($obra['anio_proyecto']); ?></h4>
                <p style="padding-right: 3em"><?php echo utf8_decode($obra['descripcion']); ?></p> 
                
                <?php if(isset($videos)):
                    $qty_videos = count($videos);
                    $hasta = ($qty_videos >= 3) ? 3 : $qty_videos;

                    for($i=0;$i<$hasta;$i++): ?>
                    <div class="col-md-4">
                        <div class="wrapper_thumbnail_video btn_video" data-toggle="modal" data-target="#modalVideo" data-video="<?php echo base_url().$videos[$i]; ?>">
                            <i class="far fa-play-circle"></i>
                            <span>Ver video</span>
                        </div>
                        <?php /*if(isset($videos[$i])): ?>
                        <video controls loop playsinline muted class="embed-responsive-item video_post" style="max-width:100%; height:auto mt20">
                        <source src="<?php echo base_url().$videos[$i]; ?>" type="video/mp4">
                        </video>
                        <?php endif;*/ ?>
                    </div>

                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
        <!--   CARROUSEL ABAJO -->
        <?php $q = count($imagenes); 
        if($q > 5): ?>
        <div class="owl-custom-nav">
            <a class="btn-next"></a>
            <a class="btn-prev"></a>
        </div>

        <div id="gallery-carousel-4" class="owl-slide zoom-gallery zoom-gallery" data-wow-delay=".2s">                                            
            <?php for($i=5; $i<$q;$i++):  ?>
                <div class='carousel-item'>
                    <div class='picframe'>
                        <a href='<?php echo base_url().$imagenes[$i]; ?>' alt=''/>
                            <img src='<?php echo base_url().$imagenes[$i]; ?>' alt='' />
                        </a>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
        <?php //   CARROUSEL ABAJO ?>
             
        <?php if($hay_datos_adicionales > 0): ?>
            <div class="row">

                <div class="col-sm-6">
                    <img src="<?php echo base_url().$destacada; ?>" width="100%"  alt="" class="post_destacada" />
                </div>
                <div class="col-sm-6 mt40 contenido">
                    
                    <p><strong>Proyecto Coordinación General</strong></p>
                    <ul style="list-style:none;">
                        <?php 
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

                        if($obra['direccion_tecnica'] != ''):
                            $direccion_tecnica = '<li><i class="fas fa-hard-hat"></i><strong>  Dirección Técnica: </strong>'.utf8_decode($obra['direccion_tecnica']).'  </li>'; 
                        endif;
                        if($obra['asist_tec_obra'] != ''):
                            $asist_tec_obra = '<li><i class="fas fa-user"></i><strong>  Asistencia Técnica en Obra: </strong>'.utf8_decode($obra['asist_tec_obra']).'  </li>';
                        endif;
                        if($obra['estructuras'] != ''):
                            $estructuras = '<li><i class="fas fa-building"></i><strong>  Estructuras :</strong>'.utf8_decode($obra['estructuras']).'  </li>';
                        endif;
                        if($obra['instalaciones'] != ''):
                            $instalaciones = '<li><i class="fas fa-broadcast-tower"></i><strong>  Instalaciones: </strong>'.utf8_decode($obra['instalaciones']).'  </li>';
                        endif;
                        if($obra['gestion_documentacion'] != ''):
                            $gestion_documentacion = '<li><i class="fas fa-file-invoice"></i><strong>   Gestión de Documentación: </strong>'.utf8_decode($obra['gestion_documentacion']).'  </li>';
                        endif;
                        if($obra['sup_terreno'] != ''):
                            $sup_terreno = '<li><i class="fas fa-ruler-combined"></i><strong>   Superficie del Terreno: </strong>'.utf8_decode($obra['sup_terreno']).'  </li>';
                        endif;
                        if($obra['sup_cubierta'] != ''):
                            $sup_cubierta = '<li><i class="fas fa-ruler-combined"></i><strong>   Superficie Cubierta: </strong>'.utf8_decode($obra['sup_cubierta']).'  </li>';
                        endif;
                        if($obra['ubicacion'] != ''):
                            $ubicacion = '<li><i class="fas fa-map-marker-alt"></i><strong>   Ubicación: </strong>'.utf8_decode($obra['ubicacion']).'  </li>';
                        endif;
                        if($obra['anio_finalizacion'] != ''):
                            $anio_finalizacion = '<li><i class="fas fa-calendar-alt"></i><strong>   Ubicación:</strong>'.utf8_decode($obra['anio_finalizacion']).'  </li>';
                        endif;
                        if($obra['fotografia'] != ''):
                            $fotografia = '<li><i class="fas fa-camera"></i><strong>   Fotografia: </strong>'.utf8_decode($obra['fotografia']).'  </li>';
                        endif;
                        
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
              
              <?php /*
              <!-- 16:9 aspect ratio vVIDEO -->
              <div class="embed-responsive embed-responsive-16by9">
                <?php if(isset($videos[0])): ?>
                    <video controls loop playsinline muted class="embed-responsive-item" style="max-width:100%; height:auto mt20">
                        <source src="<?php echo base_url().$videos[0]; ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
              </div> 
              */ ?>
             
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


