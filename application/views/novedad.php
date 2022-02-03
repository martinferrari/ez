<?php $titulo_pagina = ($idioma == 'es') ? ES_NOVEDADES : EN_NOVEDADES; ?>

<!-- subheader -->
<div class="novedads">


<section id="subheader"  data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $titulo_pagina; ?></h1>
            </div>
        </div>
    </div>
</section>

 <div id="content" class="no-top no-bottom">

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
                                $active = ($i == 0) ? "active" : ""; ?>
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
                <h3 class="id-color" ><?php echo utf8_decode($novedad['titulo']); ?></h3>
                <p style="padding-right: 3em"><?php echo utf8_decode($novedad['descripcion']); ?></p> 
                
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