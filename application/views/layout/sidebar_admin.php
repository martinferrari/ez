<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title">
                <img class="logo" src="<?php echo base_url(); ?>_res/assets/images/logo.png" alt="">
              </a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li>
                      <a href="home"><i class="fas fa-home"></i> Home</a>
                  </li>
                  <li>
                      <a href="obras"><i class="fas fa-archway"></i> Obras</a>
                  </li>
                  <li>
                      <a href="proyectos"><i class="fas fa-drafting-compass"></i> Proyectos</a>
                  </li>
                  <li>
                      <a href="novedades"><i class="fas fa-bullhorn"></i> Novedades</a>
                  </li>
                  <li>
                      <a href="nosotros"><i class="fas fa-users"></i> Nosotros</a>
                  </li>
                  <li>
                    <?php if($logged_user['logged_user_tipo'] == 1): ?>
                      <a href="usuarios"><i class="fas fa-users-cog"></i> Usuarios</a>
                    <?php endif; ?>
                  </li>
                  <li>
                      <a>
                      <i class="fas fa-paper-plane"></i> Contacto
                        <span class="fas fa-chevron-down"></span>
                      </a>

                      <ul class="nav child_menu">
                        <li><a href="entrevista">Entrevistas</a></li>
                        <li><a href="trabaja">Trabaja con nosotros</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            </div>
        </div>

         <!-- top navigation -->
         <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php echo strtoupper($logged_user['logged_user_nombre']); ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url();?>admin/logout"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                  </div>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->