<!-- subheader -->
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

<section class="section-grids">
<!-- INICIO RENGLON -->
<div class="grid" data-col="3" data-gridspace="10" data-ratio="466/700">

<?php 
$i = 0;
foreach($posts as $post): 
    $large_width = ($i == 1) ? "large-width" : "";
    ?>
        <div class="grid-sizer"></div>
        
        <div class="grid-item <?php echo $large_width; ?>">
            <!-- gallery item -->
            <div class="item">
                <div class="picframe">
                    <a href="EZESTUDIO.php">
                        <span class="overlay" >
                            <span class="pf_title">
                                <span class="project-name"><?php echo $post['titulo']; ?></span>
                            </span>
                        </span>
                    </a>
                    <img src="<?php echo base_url(); ?>_res/<?php echo $post['path']; ?>" alt="EZ Estudio">
                </div>
            </div>
            <!-- close gallery item -->
        </div>
        <!-- FIN RENGLON -->

    <?php 
    if($i == 0):
        $i = 1;
    else:
        $i = 0;
    endif;
    endforeach; ?>
</div>
</section>