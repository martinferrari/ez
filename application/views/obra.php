<!-- subheader -->
<section id="subheader"  data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Bienvenidos</h1>
            </div>
        </div>
    </div>
</section>
<!-- subheader -->  
<!-- content begin -->
 <div id="content" class="no-top no-bottom">

     <!-- VISIBLE PC TABLET -->
     <div class="hidden-xs">
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
                        for($i=0; $i<5;$i++): 
                            $active = ($i == 0) ? "active" : "";
                        ?>
                            <div class="item <?php echo $active;?>">
                                <img src="<?php echo base_url().$visuales[$i]['path']; ?>" alt="Casa CC Ezestudio" />
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>                                  
            </div>

            <div class="col-sm-6 mt40 wow fadeInRight" data-wow-delay=".5s">
                <h3 class="id-color" ><?php echo utf8_decode($obra['titulo']); ?></h3>
                <h4 class="id-color" ><?php echo utf8_decode($obra['anio_proyecto']); ?></h4>
                <p style="padding-right: 3em"><?php echo utf8_decode($obra['descripcion']); ?></p> 
            </div>
        </div>
        <!--   CARROUSEL ABAJO -->
        <div class="owl-custom-nav">
            <a class="btn-next"></a>
            <a class="btn-prev"></a>
        </div>

        <div id="gallery-carousel-4" class="owl-slide zoom-gallery zoom-gallery" data-wow-delay=".2s">                                            
            <?php
                $q = count($visuales);
                for($i=5; $i<$q;$i++):  ?>

                    <div class='carousel-item'>
                        <div class='picframe'>
                            <a href='<?php echo base_url().$visuales[$i]['path']; ?>' alt=''/>
                                <img src='<?php echo base_url().$visuales[$i]['path']; ?>' alt='' />
                            </a>
                    </div>
                </div>
                <?php endfor; ?>
                
            
            </div>
             <!--   CARROUSEL ABAJO -->
            <div class="row">
                <div class="col-sm-6">
                <img src="<?php echo base_url().$destacada; ?>" width="100%"  alt="Obra Casa CC" />
                </div>
                <div class="col-sm-6 mt40">
                    
                    <p><strong>Proyecto Coordinaci�n General</strong></p>
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
                            $direccion_tecnica = '<li><i class="fas fa-hard-hat"></i><strong>  Direcci�n T�cnica: </strong>'.utf8_decode($obra['direccion_tecnica']).'  </li>'; 
                        endif;
                        if($obra['asist_tec_obra'] != ''):
                            $asist_tec_obra = '<li><i class="fas fa-user"></i><strong>  Asistencia T�cnica en Obra: </strong>'.utf8_decode($obra['asist_tec_obra']).'  </li>';
                        endif;
                        if($obra['estructuras'] != ''):
                            $estructuras = '<li><i class="fas fa-building"></i><strong>  Estructuras :</strong>'.utf8_decode($obra['estructuras']).'  </li>';
                        endif;
                        if($obra['instalaciones'] != ''):
                            $instalaciones = '<li><i class="fas fa-broadcast-tower"></i><strong>  Instalaciones: </strong>'.utf8_decode($obra['instalaciones']).'  </li>';
                        endif;
                        if($obra['gestion_documentacion'] != ''):
                            $gestion_documentacion = '<li><i class="fas fa-file-invoice"></i><strong>   Gesti�n de Documentaci�n: </strong>'.utf8_decode($obra['gestion_documentacion']).'  </li>';
                        endif;
                        if($obra['sup_terreno'] != ''):
                            $sup_terreno = '<li><i class="fas fa-ruler-combined"></i><strong>   Superficie del Terreno: </strong>'.utf8_decode($obra['sup_terreno']).'  </li>';
                        endif;
                        if($obra['sup_cubierta'] != ''):
                            $sup_cubierta = '<li><i class="fas fa-ruler-combined"></i><strong>   Superficie Cubierta: </strong>'.utf8_decode($obra['sup_cubierta']).'  </li>';
                        endif;
                        if($obra['ubicacion'] != ''):
                            $ubicacion = '<li><i class="fas fa-map-marker-alt"></i><strong>   Ubicaci�n: </strong>'.utf8_decode($obra['ubicacion']).'  </li>';
                        endif;
                        if($obra['anio_finalizacion'] != ''):
                            $anio_finalizacion = '<li><i class="fas fa-calendar-alt"></i><strong>   Ubicaci�n:</strong>'.utf8_decode($obra['anio_finalizacion']).'  </li>';
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
              
              <!-- 16:9 aspect ratio vVIDEO -->
              <div class="embed-responsive embed-responsive-16by9">
                    <video autoplay loop playsinline muted class="embed-responsive-item" style="max-width:100%; height:auto mt20">
                            <source src="http://www.ezestudio.com.ar/video/CasaCC.mp4" type="video/mp4">
                    </video>
              </div> 
             


        </div>
</div>