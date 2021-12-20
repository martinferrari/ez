 <!-- footer begin -->
 <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/logo.png" class="logo-small" alt=""><br>
                            <a>
                        Ezestudio® a cargo de Pietro Ezio Zucchet, Arquitecto formoseño graduado en la Universidad Nacional de Córdoba en 2003 Iniciando su experiencia laboral en Italia durante el 2004.
                        Formó EZ Estudio en 2005, hasta concretar la construcción de su nueva sede en 2011, donde actualmente desarrolla, junto a un equipo de profesionales, proyectos residenciales y urbanos, sirviéndose de lí­neas puras y materiales nobles para el lenguaje de su obra. 
                        </a>
                    </div>

                    <div class="col-md-4">
                        <div class="widget widget_recent_post">
                      
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3>Información de Contacto</h3>
                        <div class="widget widget-address">
                            <address>
                                <span><strong>Telefono:</strong> <a>+54 3704 435913</a> </span>                                
                                <span><strong>Email:</strong><a href="mailto:ezestudio.com.ar">info@ezestudio.com.ar</a></span>
                                <span><strong>Web:</strong><a href="http://www.ezestudio.com.ar">http://www.ezestudio.com.ar</a></span>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            &copy; Copyright <?php echo date("Y"); ?> - Ezestudio Formosa <span class="id-color"></span>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="social-icons">
                                <a href="https://www.facebook.com/ezestudioformosa/" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                                <a href="https://www.instagram.com/ezestudio_fma/" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" id="Volver Arriba"></a>
        </footer>
        <!-- footer close -->

    </div>








<?php //MODAL Video ?>
<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-video">
		<div class="modal-content">
			<div class="modal-body">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
                                <div id="contenedor_video"></div>
							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>








    <!-- Javascript Files
    ================================================== -->
    <!-- jQuery library -->
    
    
    <script src="<?php echo base_url(); ?>_res/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/lazysizes.min.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/jpreLoader.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/easing.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/jquery.scrollto.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/jquery.countTo.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/classie.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/video.resize.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/validation.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/jquery.stellar.min.js"></script>
	<script src="<?php echo base_url(); ?>_res/assets/js/enquire.min.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/js/designesia.js"></script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->

    <!-- SLIDER REVOLUTION SCRIPTS  -->

    <?php /*<script type="text/javascript" src="<?php echo base_url(); ?>_res/assets/js/validar.js"></script>*/ ?>





    <script>

        <?php //carousel detalle de obras, proyectos ?>
        $("#myCarousel").carousel({
            interval: 3000
        })

        $(document).on("click", '.btn_video', function(event) { 
            let vid = $(this).data("video");

                let video_tag = '<video controls loop playsinline muted class="embed-responsive-item video_post" id="video_post"><source id="src_video" src="'+vid+'" type="video/mp4"></video>';

                $("#contenedor_video").append(video_tag);

                var video = document.getElementById('video_post');
                video.requestFullscreen();
                video.play();
        });
        
        document.addEventListener("fullscreenchange", function () {
            let fullsc = document.fullscreen;
            if(fullsc === false){
                $('#modalVideo').modal('toggle');
                $("#contenedor_video").html('');
            }
        }, false);
        document.addEventListener("mozfullscreenchange", function () {
            let fullsc = document.fullscreen;
            if(fullsc === false){
                $('#modalVideo').modal('toggle');
                $("#contenedor_video").html('');
            }
        }, false);
        document.addEventListener("webkitfullscreenchange", function () {
            let fullsc = document.fullscreen;
            if(fullsc === false){
                $('#modalVideo').modal('toggle');
                $("#contenedor_video").html('');
            }
        }, false);



        $("#menu-btn").on("click", function(){
            $("nav").css("background","#000");
            $("#mainmenu").toggle();
        });

    </script>


</body>
</html>