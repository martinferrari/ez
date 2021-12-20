<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/



$route['pagina_no_encontrada'] = "Web/pagina_no_encontrada";

$route['/'] = "Web/index";
$route['home'] = "Web/index";
$route['obras'] = "Web/ver_obras";
$route['proyectos'] = "Web/ver_proyectos";
$route['nosotros'] = "Web/ver_nosotros";
$route['novedades'] = "Web/ver_novedades";
$route['contacto'] = "Web/ver_contacto";

$route['web/Contacto/Entrevista'] = "Contacto/entrevista";
$route['web/Contacto/Trabaja'] = "Contacto/trabaja";


$route['obras/:num'] = "Web/ver_obra";
$route['proyectos/:num'] = "Web/ver_proyecto";
$route['novedades/:num'] = "Web/ver_novedad";

$route['obras/:num/vista_previa'] = "Web/ver_obra";
$route['proyectos/:num/vista_previa'] = "Web/ver_proyecto";
$route['novedades/:num/vista_previa'] = "Web/ver_novedad";


$route['admin'] = "admin/Usuario/ver_login";
$route['admin/login'] = "admin/Usuario/login";
$route['admin/logout'] = "admin/Usuario/logout";
$route['admin/home'] = "admin/Usuario/ver_home";

$route['admin/obras'] = "admin/Obras/ver_obras";
$route['admin/Obras'] = "admin/Obras/ver_obras";
$route['admin/Obras/VisualesObra'] = "admin/Obras/get_visuales_by_id_obra";
$route['admin/Obras/modificacionImagenesObra'] = "admin/Obras/modificacion_imagenes_obra";
$route['admin/Obras/modificacionVideosObra'] = "admin/Obras/modificacion_videos_obra";

$route['admin/proyectos'] = "admin/Proyectos/ver_proyectos";
$route['admin/Proyectos'] = "admin/Proyectos/ver_proyectos";
$route['admin/Proyectos/VisualesProyecto'] = "admin/Proyectos/get_visuales_by_id_proyecto";
$route['admin/Proyectos/modificacionImagenesProyecto'] = "admin/Proyectos/modificacion_imagenes_Proyecto";
$route['admin/Proyectos/modificacionVideosProyecto'] = "admin/Proyectos/modificacion_videos_Proyecto";

$route['admin/novedades'] = "admin/Novedades/ver_novedades";
$route['admin/Novedades'] = "admin/Novedades/ver_novedades";
$route['admin/Novedades/VisualesNovedad'] = "admin/Novedades/get_visuales_by_id_novedad";
$route['admin/Novedades/borrar_novedad'] = "admin/Novedades/borrar_novedades";
$route['admin/Novedades/modificacion_novedad'] = "admin/Novedades/modificacion_novedad";
$route['admin/Novedades/modificacionImagenesNovedad'] = "admin/Novedades/modificacion_imagenes_novedad";
$route['admin/Novedades/modificacionVideosNovedad'] = "admin/Novedades/modificacion_videos_novedad";

$route['admin/nosotros'] = "admin/Nosotros/ver_nosotros";
$route['admin/nosotros/VisualesNosotros'] = "admin/Nosotros/get_visuales_by_id_nosotros";

$route['admin/usuarios'] = "admin/Usuario/ver_usuarios";

$route['admin/entrevista'] = "admin/Contacto/ver_entrevistas";
$route['admin/trabaja'] = "admin/Contacto/ver_trabaja_con_nosotros";







$route['default_controller'] = "web/index";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */