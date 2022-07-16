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


// WEB //
$route['pagina_no_encontrada'] = "web/pagina_no_encontrada";

$route['/'] = "web/index";
$route['home'] = "web/index";
$route['obras'] = "web/ver_obras";
$route['obras_ejecucion'] = "web/ver_obras_ejecucion";
$route['proyectos'] = "web/ver_proyectos";
$route['nosotros'] = "web/ver_nosotros";
$route['nosotros/vista_previa'] = "web/ver_nosotros_vista_previa";
$route['novedades'] = "web/ver_novedades";
$route['contacto'] = "web/ver_contacto";

$route['idioma/(:any)'] = "web/idioma";

$route['web/Contacto/Entrevista'] = "Contacto/entrevista";
$route['web/Contacto/Trabaja'] = "Contacto/trabaja";

$route['web/ver_mas_post_home'] = "web/ver_mas_post_home";

$route['obras/:num'] = "web/ver_obra";
$route['proyectos/:num'] = "web/ver_proyecto";
$route['novedades/:num'] = "web/ver_novedad";

$route['obras/:num/vista_previa'] = "web/ver_obra";
$route['proyectos/:num/vista_previa'] = "web/ver_proyecto";
$route['novedades/:num/vista_previa'] = "web/ver_novedad";


$route['shop'] = "shop/index";
$route['shop/murvi'] = "shop/ver_catalogo_murvi";
$route['shop/murvi/solicitar_cotizacion'] = "shop/solicitar_cotizacion";
// WEB //


//ADMIN //

$route['admin'] = "admin/Usuario/ver_login";
$route['admin/login'] = "admin/Usuario/login";
$route['admin/logout'] = "admin/Usuario/logout";
$route['admin/home'] = "admin/Usuario/ver_home";

$route['admin/obras'] = "admin/Obras/ver_obras";
$route['admin/Obras'] = "admin/Obras/ver_obras";
$route['admin/Obras/VisualesObra'] = "admin/Obras/get_visuales_by_id_obra";
$route['admin/Obras/modificacionImagenesObra'] = "admin/Obras/modificacion_imagenes_obra";
$route['admin/Obras/modificacionVideosObra'] = "admin/Obras/modificacion_videos_obra";
$route['admin/Obras/modificacionIdiomaObra'] = "admin/Obras/modificacion_traduccion";
$route['admin/Obras/TraduccionObra'] = "admin/Obras/obtener_traduccion";

$route['admin/obras_ejecucion'] = "admin/Obras/ver_obras_ejecucion";
$route['admin/Obras_ejecucion'] = "admin/Obras/ver_obras_ejecucion";



$route['admin/proyectos'] = "admin/Proyectos/ver_proyectos";
$route['admin/Proyectos'] = "admin/Proyectos/ver_proyectos";
$route['admin/Proyectos/VisualesProyecto'] = "admin/Proyectos/get_visuales_by_id_proyecto";
$route['admin/Proyectos/modificacionImagenesProyecto'] = "admin/Proyectos/modificacion_imagenes_Proyecto";
$route['admin/Proyectos/modificacionVideosProyecto'] = "admin/Proyectos/modificacion_videos_Proyecto";
$route['admin/Proyectos/modificacionIdiomaProyecto'] = "admin/Proyectos/modificacion_traduccion";
$route['admin/Proyectos/TraduccionProyecto'] = "admin/Proyectos/obtener_traduccion";

$route['admin/novedades'] = "admin/Novedades/ver_novedades";
$route['admin/Novedades'] = "admin/Novedades/ver_novedades";
$route['admin/Novedades/VisualesNovedad'] = "admin/Novedades/get_visuales_by_id_novedad";
$route['admin/Novedades/borrar_novedad'] = "admin/Novedades/borrar_novedades";
$route['admin/novedades/modificacion_novedad'] = "admin/Novedades/modificacion_novedad";
$route['admin/Novedades/modificacionImagenesNovedad'] = "admin/Novedades/modificacion_imagenes_novedad";
$route['admin/Novedades/modificacionVideosNovedad'] = "admin/Novedades/modificacion_videos_novedad";
$route['admin/Novedades/modificacionIdiomaNovedad'] = "admin/Novedades/modificacion_traduccion";
$route['admin/Novedades/TraduccionNovedad'] = "admin/Novedades/obtener_traduccion";
$route['admin/novedades/altaNovedad'] = "admin/Novedades/altaNovedad";

$route['admin/nosotros'] = "admin/Nosotros/ver_nosotros";
$route['admin/nosotros/altaNosotros'] = "admin/Nosotros/altaNosotros"; 
$route['admin/nosotros/modificacion_nosotros'] = "admin/Nosotros/modificacion_nosotros"; 
$route['admin/nosotros/VisualesNosotros'] = "admin/Nosotros/get_visuales_by_id_nosotros";
$route['admin/nosotros/modificacionTraduccion'] = "admin/Nosotros/modificacion_traduccion";
$route['admin/nosotros/traduccion'] = "admin/Nosotros/obtener_traduccion";

$route['admin/usuarios'] = "admin/Usuario/ver_usuarios";

$route['admin/entrevista'] = "admin/Contacto/ver_entrevistas";
$route['admin/trabaja'] = "admin/Contacto/ver_trabaja_con_nosotros";

$route['admin/zocalos'] = "admin/Zocalo/ver_zocalos";
$route['admin/zocalo/modificacion'] = "admin/Zocalo/modificacion";

//SHOP
$route['admin/murvi'] = "admin/Murvi/ver_catalogo";
$route['admin/shop/murvi/alta_producto'] = "admin/Murvi/alta_producto";
$route['admin/shop/murvi/modificacion_producto'] = "admin/Murvi/modificacion_producto";
$route['admin/shop/murvi/modificacion_imagenes'] = "admin/Murvi/modificacion_imagenes";
$route['admin/shop/murvi/visuales'] = "admin/Murvi/get_visuales_by_id_producto";
$route['admin/shop/murvi/borrar/(:num)'] = "admin/Murvi/borrar_producto";

$route['admin/cotizaciones'] = "admin/Cotizacion/ver_cotizaciones";
$route['admin/detalle_cotizaciones'] = "admin/Cotizacion/obtener_detalle";
$route['admin/modificacion_cotizacion'] = "admin/Cotizacion/modificacion_cotizacion";



//ADMIN //




// $route['default_controller'] = "web/index";
// $route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */