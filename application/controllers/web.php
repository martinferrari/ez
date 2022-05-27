<?php ob_start(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
		$this->load->library('session');
	}

	//Setea el idioma al clickear en una bandera
	function idioma(){
		$idioma = $this->uri->segment(2);
		if($idioma == "es"):
			$this->session->set_userdata("idioma","es");
		endif;

		if($idioma == "en"):
			$this->session->set_userdata("idioma","en");
		endif;

		if($idioma == ""):
			$this->session->set_userdata("idioma","es");
		endif;

		redirect($this->agent->referrer());
	}
	
	//obtiene el idioma
	function ver_idioma(){
		if($this->session->userdata("idioma") == "es"):
			$this->session->set_userdata("idioma","es");
		endif;

		if($this->session->userdata("idioma") == "en"):
			$this->session->set_userdata("idioma","en");
		endif;

		if($this->session->userdata("idioma") == ""):
			$this->session->set_userdata("idioma","es");
		endif;
		return $this->session->userdata("idioma");
	}
	

	public function index()
	{
		$idioma = $this->ver_idioma();
		$data['idioma'] = $idioma;
		$this->load->model('admin/obras_model');

		$conf = $this->obras_model->get_configuracion_home();
		$cantidad = ($conf['cantidad']['valor'] != '') ? $conf['cantidad']['valor'] : 10;
		$orden = ($conf['orden']['valor'] != '') ? $conf['orden']['valor'] : 'id desc';

		$data['posts'] = $this->post_model->obtener_post_home($cantidad, $orden, $idioma);
		
		$this->load->view('layout/head', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer', $data);
	}


	public function ver_contacto()
	{
		$idioma = $this->ver_idioma();
		$data['idioma'] = $idioma;

		$this->load->view('layout/head', $data);
		$this->load->view('contacto');
		$this->load->view('layout/footer', $data);
	}



	public function ver_nosotros()
	{
		$idioma = $this->ver_idioma();
		
		$this->load->model('admin/nosotros_model');
		$nosotros = $this->nosotros_model->obtener_nosotros(null, 1, 'id asc');

		foreach($nosotros as $k => $v):
			$visuales = $this->post_model->obtener_visuales_nosotros($v['id']);
			$nosotros[$k]['visuales'] = $visuales;
		endforeach;

		if($idioma == 'es'):
			$data['ingeniero_civil'] = ES_INGENIERO_CIVIL;
			$data['calculo'] = ES_CALCULO;
			$data['diseño_estructural'] = ES_DISENIO_ESTRUCTURAL;
			$data['arquitecto'] = ES_ARQUITECTO;
			$data['disenio'] = ES_DISENIO;
			$data['coordinación_general'] = ES_COORDINACION_GENERAL;
		 else:
			$data['ingeniero_civil'] = EN_INGENIERO_CIVIL;
			$data['calculo'] = EN_CALCULO;
			$data['diseño_estructural'] = EN_DISENIO_ESTRUCTURAL;
			$data['arquitecto'] = EN_ARQUITECTO;
			$data['disenio'] = EN_DISENIO;
			$data['coordinación_general'] = EN_COORDINACION_GENERAL;
		 endif;
		
		$data['nosotros'] = $nosotros;
		$data['idioma'] = $idioma;

		$this->load->view('layout/head', $data);
		$this->load->view('nosotros', $data);
		$this->load->view('layout/footer', $data);
	}

	function ver_nosotros_vista_previa(){
		$idioma = $this->ver_idioma();

		$this->load->model('nosotros_model');
		$nosotros = $this->nosotros_model->obtener_nosotros(null, null);

		foreach($nosotros as $k => $v):
			$visuales = $this->post_model->obtener_visuales_nosotros($v['id']);
			$nosotros[$k]['visuales'] = $visuales;
		endforeach;
		
		$data['nosotros'] = $nosotros;
		$data['idioma'] = $idioma;

		$this->load->view('layout/head', $data);
		$this->load->view('nosotros', $data);
		$this->load->view('layout/footer', $data);
	}


	function ver_novedad(){
		$idioma = $this->ver_idioma();

		$id_novedad = $this->uri->segment(2);
		$vp = $this->uri->segment(3);
		$estado = ($vp == 'vista_previa' ) ? 0 : 1;

		$novedad = $this->post_model->obtener_novedad($id_novedad,$estado, $idioma);
		$visuales = $this->post_model->obtener_visuales($id_novedad);

		$destacada = '';
		foreach($visuales as $v):
			if($v['es_destacada'] == 1):
				$destacada = $v['path'];
			endif;

			if($v['tipo'] != 3):
				$imagenes[] = $v['path'];
			endif;
			
			if($v['tipo'] == 3):
				$videos[] = $v['path'];
			endif;
			
		endforeach;

		$data['novedad'] = $novedad[0];
		$data['imagenes'] = ( isset($imagenes) ) ? $imagenes : NULL;
		$data['videos'] = ( isset($videos) ) ? $videos : NULL;
		$data['destacada'] = $destacada;
		$data['idioma'] = $idioma;

		$this->load->view('layout/head', $data);
		$this->load->view('novedad', $data);
		$this->load->view('layout/footer', $data);

	}

	public function ver_novedades()
	{
		$idioma = $this->ver_idioma();
		
		$this->load->model('admin/novedades_model');

		$conf = $this->novedades_model->get_configuracion();
		$cantidad = ($conf['cantidad']['valor'] != '') ? $conf['cantidad']['valor'] : 10;
		$orden = ($conf['orden']['valor'] != '') ? $conf['orden']['valor'] : 'id desc';

		$data['posts'] = $this->post_model->obtener_novedades($cantidad, $orden, $idioma);
		$data['idioma'] = $idioma;

		$this->load->view('layout/head', $data);
		$this->load->view('novedades', $data);
		$this->load->view('layout/footer', $data);
	}

	
	function pagina_no_encontrada(){
		$idioma = $this->ver_idioma();
		$data['idioma'] = $idioma;

		$this->load->view('layout/head', $data);
		$this->load->view('pagina_no_encontrada', $data);
		$this->load->view('layout/footer', $data);
	}


	function ver_obra(){
		$id_obra = $this->uri->segment(2);
		$vp = $this->uri->segment(3);
		$estado = ($vp == 'vista_previa' ) ? 0 : 1;

		$idioma = $this->ver_idioma();
		
		$obra = $this->post_model->obtener_obra($id_obra,$estado,$idioma);
		
		if(count($obra)==0):
			redirect('pagina_no_encontrada');
		endif;

		$visuales = $this->post_model->obtener_visuales($id_obra);

		$destacada = '';
		foreach($visuales as $v):
			if($v['es_destacada'] == 1):
				$destacada = $v['path'];
			endif;

			if($v['tipo'] != 3):
				$imagenes[] = $v['path'];
			endif;
			
			if($v['tipo'] == 3):
				$videos[] = $v['path'];
			endif;
			
		endforeach;

		$data_adicional['proyecto'] = $obra[0]['proyecto'];
		$data_adicional['ejecucion'] = $obra[0]['ejecucion'];
		$data_adicional['construccion_direccion'] = $obra[0]['construccion_direccion'];
		$data_adicional['disenio_dim_estruc'] = $obra[0]['disenio_dim_estruc'];
		$data_adicional['tipologia'] = $obra[0]['tipologia'];
		$data_adicional['disenio_dim_clim'] = $obra[0]['disenio_dim_clim'];
		$data_adicional['area'] = $obra[0]['area'];

		$data_adicional['direccion_tecnica'] = $obra[0]['direccion_tecnica'];
		$data_adicional['asist_tec_obra'] = $obra[0]['asist_tec_obra'];
		$data_adicional['estructuras'] = $obra[0]['estructuras'];
		$data_adicional['instalaciones'] = $obra[0]['instalaciones'];
		$data_adicional['gestion_documentacion'] = $obra[0]['gestion_documentacion'];
		$data_adicional['sup_terreno'] = $obra[0]['sup_terreno'];
		$data_adicional['sup_cubierta'] = $obra[0]['sup_cubierta'];
		$data_adicional['ubicacion'] = $obra[0]['ubicacion'];
		$data_adicional['anio_finalizacion'] = $obra[0]['anio_finalizacion'];
		$data_adicional['fotografia'] = $obra[0]['fotografia'];
		
		$hay_datos_adicionales = 0;
		foreach($data_adicional as $k => $v):
			if($v != ''):
				$hay_datos_adicionales++;
			endif;
		endforeach;
		

		$data['obra'] = $obra[0];
		$data['imagenes'] = ( isset($imagenes) ) ? $imagenes : NULL;
		$data['videos'] = ( isset($videos) ) ? $videos : NULL;
		$data['destacada'] = $destacada;
		$data['data_adicional'] = $data_adicional;
		$data['hay_datos_adicionales'] = $hay_datos_adicionales;
		$data['idioma'] = $idioma;
		$data['tipo'] = 1;

		
		$this->load->view('layout/head', $data);
		$this->load->view('obra', $data);
		$this->load->view('layout/footer', $data);

	}

	public function ver_obras()
	{
		$idioma = $this->ver_idioma();

		$this->load->model('admin/obras_model');

		$conf = $this->obras_model->get_configuracion();
		$cantidad = ($conf['cantidad']['valor'] != '') ? $conf['cantidad']['valor'] : 10;
		$orden = ($conf['orden']['valor'] != '') ? $conf['orden']['valor'] : 'id desc';
		$data['posts'] = $this->post_model->obtener_obras($cantidad, $orden, $idioma, 1);
		$data['idioma'] = $idioma;
		$data['tipo'] = 1;

		$this->load->view('layout/head', $data);
		$this->load->view('obras', $data);
		$this->load->view('layout/footer', $data);
	}

	public function ver_obras_ejecucion()
	{
		$idioma = $this->ver_idioma();

		$this->load->model('admin/obras_model');

		$conf = $this->obras_model->get_configuracion();
		$cantidad = ($conf['cantidad']['valor'] != '') ? $conf['cantidad']['valor'] : 10;
		$orden = ($conf['orden']['valor'] != '') ? $conf['orden']['valor'] : 'id desc';
		$data['posts'] = $this->post_model->obtener_obras($cantidad, $orden, $idioma, 4);
		$data['idioma'] = $idioma;
		$data['tipo'] = 4;

		$this->load->view('layout/head', $data);
		$this->load->view('obras', $data);
		$this->load->view('layout/footer', $data);
	}

	function ver_proyecto(){
		$id_proyecto = $this->uri->segment(2);
		$vp = $this->uri->segment(3);
		$estado = ($vp == 'vista_previa' ) ? 0 : 1;
		
		$idioma = $this->ver_idioma();

		$proyecto = $this->post_model->obtener_proyecto($id_proyecto,$estado,$idioma);

		if(count($proyecto)==0):
			redirect('pagina_no_encontrada');
		endif;

		$visuales = $this->post_model->obtener_visuales($id_proyecto);

		$destacada = '';
		foreach($visuales as $v):
			if($v['es_destacada'] == 1):
				$destacada = $v['path'];
			endif;

			if($v['tipo'] != 3):
				$imagenes[] = $v['path'];
			endif;
			
			if($v['tipo'] == 3):
				$videos[] = $v['path'];
			endif;
			
		endforeach;

		$data_adicional['proyecto'] = $proyecto[0]['proyecto'];
		$data_adicional['ejecucion'] = $proyecto[0]['ejecucion'];
		$data_adicional['construccion_direccion'] = $proyecto[0]['construccion_direccion'];
		$data_adicional['disenio_dim_estruc'] = $proyecto[0]['disenio_dim_estruc'];
		$data_adicional['tipologia'] = $proyecto[0]['tipologia'];
		$data_adicional['disenio_dim_clim'] = $proyecto[0]['disenio_dim_clim'];
		$data_adicional['area'] = $proyecto[0]['area'];

		$data_adicional['direccion_tecnica'] = $proyecto[0]['direccion_tecnica'];
		$data_adicional['asist_tec_obra'] = $proyecto[0]['asist_tec_obra'];
		$data_adicional['estructuras'] = $proyecto[0]['estructuras'];
		$data_adicional['instalaciones'] = $proyecto[0]['instalaciones'];
		$data_adicional['gestion_documentacion'] = $proyecto[0]['gestion_documentacion'];
		$data_adicional['sup_terreno'] = $proyecto[0]['sup_terreno'];
		$data_adicional['sup_cubierta'] = $proyecto[0]['sup_cubierta'];
		$data_adicional['ubicacion'] = $proyecto[0]['ubicacion'];
		$data_adicional['anio_finalizacion'] = $proyecto[0]['anio_finalizacion'];
		$data_adicional['fotografia'] = $proyecto[0]['fotografia'];
		
		$hay_datos_adicionales = 0;
		foreach($data_adicional as $k => $v):
			if($v != ''):
				$hay_datos_adicionales++;
			endif;
		endforeach;
		

		$data['proyecto'] = $proyecto[0];
		$data['imagenes'] = ( isset($imagenes) ) ? $imagenes : NULL;
		$data['videos'] = ( isset($videos) ) ? $videos : NULL;
		$data['destacada'] = $destacada;
		$data['data_adicional'] = $data_adicional;
		$data['hay_datos_adicionales'] = $hay_datos_adicionales;
		$data['idioma'] = $idioma;


		$this->load->view('layout/head', $data);
		$this->load->view('proyecto', $data);
		$this->load->view('layout/footer', $data);

	}

	public function ver_proyectos()
	{
		$this->load->model('admin/proyectos_model');
		$idioma = $this->ver_idioma();

		$conf = $this->proyectos_model->get_configuracion();
		$cantidad = ($conf['cantidad']['valor'] != '') ? $conf['cantidad']['valor'] : 10;
		$orden = ($conf['orden']['valor'] != '') ? $conf['orden']['valor'] : 'id desc';

		$data['posts'] = $this->post_model->obtener_proyectos($cantidad, $orden, $idioma);
		$data['idioma'] = $idioma;

		$this->load->view('layout/head', $data);
		$this->load->view('proyectos', $data);
		$this->load->view('layout/footer', $data);
	}

	

}
