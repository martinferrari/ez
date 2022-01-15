<?php $titulo_pagina = ($idioma == 'es') ? ES_NOSOTROS : EN_NOSOTROS; ?>
<div class="nosotros">
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
<div id="content" class="no-top no-bottom">
     <!-- section Foto + Info version tablet pc-->
     <div class="hidden-sm1">
         <div class="hidden-xs1">
             <div class="containter">

                 <div class="row">
                     <!-- PRIMERA FOTO -->

                     <div class="col-md-4" m style="padding-right: 0em">
                         <img src="<?php echo base_url(); ?>_res/assets/images/nosotros1.jpg" width="100%" class="img-thumbnail">
                     </div>

                     <!-- PRIMERA FOTO -->

                     <!-- SEGUNDA FOTO ARRIBA Y ABAJO -->
                     <div class="col-md-8" style="padding-left: 0em">
                         <div class="row-fluid">
                             <div class="col-md-12" style="padding-right: 0em; padding-left:0em;">
                                 <img src="<?php echo base_url(); ?>_res/assets/images/nosotros2.png" width="100%">
                             </div>
                             <div class="col-md-6">
                                 <strong>
                                     <p style="padding-left: 25%; padding-top:2em">Graciano Zucchet <br> Ingeniero Civil</p>
                                 </strong>
                                 <p style="padding-left: 25%">Cálculo <br> Diseño Estructural</p>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <strong>
                                 <p style="padding-left: 35%; padding-top:2em">Pietro Ezio Zucchet<br>Arquitecto CPAF 443</p>
                             </strong>
                             <p style="padding-left:35%">Diseño<br>Coordinación General</p>
                         </div>
                     </div>
                     <!-- SEGUNDA FOTO ARRIBA Y ABAJO -->
                 </div>






                <?php //RENGLONES ?>
                <?php 
                $cantidad = count($nosotros); 
                $i = 1;
                foreach($nosotros as $n): ?>
                    <div class="row">
                    <?php if($i == 1): ?>
                        <div class="row">
                            <div class="col-md-3 nosotros c1">
                                <img src="<?php echo base_url().'/'.$n['visuales'][0]['path']; ?>" class="img-thumbnail" width="100%">
                            </div>
                            <div class="col-md-3 nosotros c2">
                                <p class="p1"><?php echo $n['nombre']." ".$n['apellido']; ?></p>
                                <p class="p2"><?php echo utf8_decode($n['cargo']); ?>
                            </div>
                            <div class="col-md-3 nosotros c3">
                                <img src="<?php echo base_url().'/'.$n['visuales'][1]['path']; ?>" class="img-thumbnail" width="100%">
                            </div>
                            <div class="col-md-3 nosotros c4">
                            <img src="<?php echo base_url().'/'.$n['visuales'][2]['path']; ?>" class="img-thumbnail" width="100%">
                            </div>
                        </div>
                    <?php endif; ?>



                    <?php if($i == 2): ?>
                        
                        <div class="row">
                            <div class="col-md-6 nosotros cg1">
                                <img src="<?php echo base_url().'/'.$n['visuales'][0]['path']; ?>" class="img-thumbnail" width="100%">
                            </div>
                            
                            <!-- CUARTA FILA LADO DERECHO VARIAS FOTOS -->
                            <div class="col-md-6 nosotros cg2" >
                                <div class="row-fluid">
                                    <div class="col-md-6 nosotros cg3">
                                        <img src="<?php echo base_url().'/'.$n['visuales'][1]['path']; ?>" class="img-thumbnail" width="100%">
                                    </div>
                                    <div class="col-md-6 nosotros cg4">
                                        <img src="<?php echo base_url().'/'.$n['visuales'][2]['path']; ?>" class="img-thumbnail" width="100%">
                                    </div>
                                <div>

                                <div class="col-md-5 nosotros cg5"> 
                                    <p class="p1"><?php echo utf8_decode($n['nombre']." ".$n['apellido']); ?></p>
                                    <p class="p2"><?php echo utf8_decode($n['cargo']); ?>
                                 </div>
                                 <div class="col-md-7 nosotros cg6">
                                     <img src="<?php echo base_url().'/'.$n['visuales'][3]['path']; ?>" class="img-thumbnail" width="100%">
                                </div>
                                 <div class="col-md-12 nosotros cg7">
                                     <img src="<?php echo base_url().'/'.$n['visuales'][4]['path']; ?>" class="img-thumbnail" width="100%">
                                </div>
                            </div>
                        </div>
                        </div>  
                    <?php endif; ?>
                </div>
                
                <?php 
                $i++; 
                $i = ($i == 3) ? 1 : 2;
                ?>
                
                <?php endforeach; ?>

            
</div>