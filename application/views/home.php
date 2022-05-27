<?php $titulo_pagina = ($idioma == 'es') ? "Bienvenidos" : "Welcome"; ?>
<!-- subheader -->
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

<section class="section-grids">
<!-- INICIO RENGLON -->
<div class="grid" data-col="3" data-gridspace="10" data-ratio="466/700">

<?php 
$i = 0;
$lw = [1,2,5,6,9,10,13,14,17,18,21,22];
foreach($posts as $post): 
    if(in_array($i,$lw)):
        $large_width = "large-width";
        $imagen = $post['path'];
    else:
        $large_width = "";
        $imagen = $post['cuadrada'];
    endif;

    if($post['tipo'] == 1):
        $url = base_url()."obras/".$post['id'];
    elseif($post['tipo'] == 2):
        $url = base_url()."proyectos/".$post['id'];
    elseif($post['tipo'] == 3):
        $url = base_url()."novedades/".$post['id'];
    endif;
    ?>
        <div class="grid-sizer"></div>
        
        <div class="grid-item <?php echo $large_width; ?>">
            <!-- gallery item -->
            <div class="item">
                <div class="picframe">
                    <a href="<?php echo $url; ?>">
                        <span class="overlay" >
                            <span class="pf_title">
                                <span class="project-name"><?php echo $post['titulo']; ?></span>
                            </span>
                        </span>
                    </a>
                    <img src="<?php echo base_url(); ?><?php echo $imagen; ?>" alt="EZ Estudio">
                </div>
            </div>
            <!-- close gallery item -->
        </div>
        <!-- FIN RENGLON -->

    <?php 
    $i++;
    endforeach; ?>
</div>
</section>