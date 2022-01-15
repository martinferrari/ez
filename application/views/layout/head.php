<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Ezestudio - Formosa - Proyectos residenciales y Urbanos </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="El Estudio se especializa en proyectos residenciales y urbanos sirvi�ndose de l�neas puras y materiales nobles. ">
    <meta name="keywords" content="architecture,building,arquitectura,Laboratorio de materiales,estructuras,materiales nobles, proyectos formosa, residenciales Formosa, EZ Estudio, Ez Estudio Formosa,Urbanos,Obras">
    <meta name="author" content="Actualizaci�n constante en materiales y tecnolog�as aplicadas a la Arquitectura">
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->
    <!-- CSS Files
    ================================================== -->
    <link rel="icon"  href="http://ezestudio.com.ar/images/favicon.png" type="image/png" />
    <link rel="Shortcut Icon" href="http://ezestudio.com.ar/images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/jpreloader.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/plugin.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/owl.transitions.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/lightslider.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/style.css" type="text/css">
    <!-- custom background -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/bg.css" type="text/css">
    <!-- color scheme -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/color.css" type="text/css" id="colors">
    <!-- load fonts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/fonts/font-awesome/css/all.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/fonts/font-awesome/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/fonts/elegant_font/HTML_CSS/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/fonts/et-line-font/style.css" type="text/css">
    <!-- revolution slider -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/rs-plugin/css/settings.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/rev-settings.css" type="text/css">
    <!-- youtube background -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/jquery.mb.YTPlayer.min.css" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>_res/assets/css/ez.css" type="text/css">

</head>

<body id="homepage">
<div id="wrapper">
        <!-- header begin -->
        <header class="header-bg"> 
              
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="/">
                                <img class="logo" src="<?php echo base_url(); ?>_res/assets/images/logo.png" with="140px" alt="">
                            </a>
                        </div>
                        <!-- logo close -->
                        <!-- small button begin -->
                        <span id="menu-btn"></span>
                        <!-- small button close -->
                        <!-- mainmenu begin -->
                        <nav>
                            <ul id="mainmenu">
                                <?php 
                                    $inicio_label = ($idioma == "es") ? ES_INICIO : EN_INICIO;
                                    $obras_label = ($idioma == "es") ? ES_OBRAS : EN_OBRAS;
                                    $proyectos_label = ($idioma == "es") ? ES_PROYECTOS : EN_PROYECTOS;
                                    $nosotros_label = ($idioma == "es") ? ES_NOSOTROS : EN_NOSOTROS;
                                    $novedades_label = ($idioma == "es") ? ES_NOVEDADES : EN_NOVEDADES;
                                    $contacto_label = ($idioma == "es") ? ES_CONTACTO : EN_CONTACTO;
                                 ?>

								<li>
                                    <a href="<?php echo base_url();?>home">
                                        <?php echo $inicio_label; ?>
                                    </a>
                                </li>															
                                <li>
                                    <a href="<?php echo base_url();?>obras">
                                        <?php echo $obras_label; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>proyectos">
                                        <?php echo $proyectos_label; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>nosotros">
                                        <?php echo $nosotros_label; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>novedades">
                                        <?php echo $novedades_label; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>contacto">
                                        <?php echo $contacto_label; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>idioma/es">
                                        <img class="flag_lang" src="<?php echo base_url();?>_res/assets/images/esp.png">
                                    </a>
                                    <a href="<?php echo base_url();?>idioma/en" class="pleft0">
                                        <img class="flag_lang" src="<?php echo base_url();?>_res/assets/images/eng.png">
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    <!-- mainmenu close -->

                </div>
            </div>
        </header>
        
        <!-- header close -->