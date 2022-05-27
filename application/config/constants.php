<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('ES_PROYECTO', "Proyecto");
define('EN_PROYECTO', "Project");
define('ES_UBICACION', "Ubicaci&oacute;n");
define('EN_UBICACION', "Location");

define('ES_EJECUCION', "Ejecuci&oacute;n");
define('EN_EJECUCION', "Execution");
define('ES_DIR_CONSTRUC', "Direcci&oacute;n de la Construcci&oacute;n");
define('EN_DIR_CONSTRUC', "Construction Direction");
define('ES_DIS_DIM_EST', "Dise&ntilde;o y Dimensionado Estructural");
define('EN_DIS_DIM_EST', "Structural Design and Dimensioning");
define('ES_TIPOLOGIA', "Tipolog&iacute;a");
define('EN_TIPOLOGIA', "Typology");
define('ES_DIS_DIM_CLI', "Dise&ntilde;o y Dimensionado de Climatizaci&oacute;n");
define('EN_DIS_DIM_CLI', "Design and Dimensioning of Air Conditioning");
define('ES_AREA', "Area");
define('EN_AREA', "Area");
define('ES_DIR_TECNICA', "Direcci&oacute;n T&eacute;cnica");
define('EN_DIR_TECNICA', "Technical direction");
define('ES_ASIST_TECT_OBRA', "Asistencia T&eacute;cnica en Obra");
define('EN_ASIST_TECT_OBRA', "Technical Assistance on Site");
define('ES_ESTRUCTURAS', "Estructuras");
define('EN_ESTRUCTURAS', "Structures");
define('ES_INSTALACIONES', "Instalaciones");
define('EN_INSTALACIONES', "Facilities");
define('ES_GEST_DOCUMENTACION', "Gesti&oacute;n de Documentaci&oacute;n");
define('EN_GEST_DOCUMENTACION', "Documentation Management");
define('ES_SUP_TERRENO', "Superficie del Terreno");
define('EN_SUP_TERRENO', "Land's Surface");
define('ES_SUP_CUBIERTA', "Superficie Cubierta");
define('EN_SUP_CUBIERTA', "Covered Area");
define('ES_ANIO_FINALIZ', "A&ntilde;o de finalizaci&oacute;n");
define('EN_ANIO_FINALIZ', "Ending year");
define('ES_FOTOGRAFIA', "Fotograf&iacute;a");
define('EN_FOTOGRAFIA', "Photography");

define('ES_INICIO', "Inicio");
define('EN_INICIO', "Home");
define('ES_OBRAS', "Obras");
define('EN_OBRAS', "Constructions");
define('ES_OBRAS_EJEC', "En Ejecuci&oacute;n");
define('EN_OBRAS_EJEC', "In progress");
define('ES_PROYECTOS', "Proyectos");
define('EN_PROYECTOS', "Projects");
define('ES_NOSOTROS', "Nosotros");
define('EN_NOSOTROS', "About Us");
define('ES_NOVEDADES', "Novedades");
define('EN_NOVEDADES', "News");
define('ES_CONTACTO', "Contacto");
define('EN_CONTACTO', "Contact");
define('ES_SHOP', "Shop");
define('EN_SHOP', "Shop");

define('ES_INGENIERO_CIVIL', "Ingeniero Civil");
define('EN_INGENIERO_CIVIL', "Civil Engineer");
define('ES_CALCULO', "C&aacute;lculo");
define('EN_CALCULO', "Calculation");
define('ES_DISENIO_ESTRUCTURAL', "Dise&ntilde;o Estructural");
define('EN_DISENIO_ESTRUCTURAL', "Structural design");
define('ES_ARQUITECTO', "Arquitecto");
define('EN_ARQUITECTO', "Architect");
define('ES_DISENIO', "Dise&ntilde;o");
define('EN_DISENIO', "Design");
define('ES_COORDINACION_GENERAL', "Coordinaci&oacute;n General");
define('EN_COORDINACION_GENERAL', "General coordination");
define('NUMERO_WHATSAPP', "543704576784");  

// define('ES_', "");
// define('EN_', "");




/* End of file constants.php */
/* Location: ./application/config/constants.php */