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
<div class="grid" data-col="3" data-gridspace="10" data-ratio="466/700" id="wrapper_posts">

<?php 
$i = 0;
$lw = [1,2,5,6,9,10,13,14,17,18,21,22,25,26,29,30,33,34,37,38,41,42,45,46,49,50,53,54,57,58,61,62,65,66,69,70,73,74,77,78,81,82,85,86,89,90,93,94,97,98];

$j = 1; //

foreach($posts as $post): 

    
    if(in_array($i,$lw)):
        $large_width = "large-width";
        $imagen = $post['path'];
    else:
        $large_width = "";
        $imagen = $post['cuadrada'];
    endif;

    /**/
    $imagen_path = $imagen;
    if($j < 5):
        $visible = "";
    else:
        $visible = "style='display:none;'";
        $imagen = "";
    endif; 
    /** */

    if($post['tipo'] == 1):
        $url = base_url()."obras/".$post['id'];
    elseif($post['tipo'] == 2):
        $url = base_url()."proyectos/".$post['id'];
    elseif($post['tipo'] == 3):
        $url = base_url()."novedades/".$post['id'];
    endif;
    ?>
        <div class="grid-sizer"></div>

        <div class="grid-item <?php echo $large_width; ?>" data-numero="<?php echo $j; ?>" 
        <?php echo $visible; ?> id="numero_<?php echo $j; ?>" data-imagen="<?php echo $imagen_path; ?>">
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
        

    <?php 
    $i++;
    $j++;
    endforeach; ?>

</div>
<!-- FIN RENGLON -->

<div class="container">
<div class="row">
    <div class="col-md-12">
    <input type="hidden" value="<?php echo $cantidad+1; ?>" id="desde" data-cantidad_para_agregar="<?php echo $cantidad; ?>">
    <button type="button" id="btn_ver_mas" class="btn btn-primary">Ver mas</button>
    </div>
</div>
</div>


</section>

