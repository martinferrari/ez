<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
	}


	public function index()
	{
		$data['posts'] = array();
		$data['posts'] = $this->post_model->obtener_post_home(10);
		
		$this->load->view('layout/head');
		$this->load->view('home', $data);
		$this->load->view('layout/footer');
	}


	function ver_obra(){
		$id_obra = $this->uri->segment(2);
		$obra = $this->post_model->obtener_obra($id_obra);
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
		$data['imagenes'] = $imagenes;
		$data['videos'] = $videos;
		$data['destacada'] = $destacada;
		$data['data_adicional'] = $data_adicional;
		$data['hay_datos_adicionales'] = $hay_datos_adicionales;

		
		$this->load->view('layout/head');
		$this->load->view('obra', $data);
		$this->load->view('layout/footer');

	}

	public function ver_obras()
	{
		$data['posts'] = $this->post_model->obtener_obras(10);

		$this->load->view('layout/head');
		$this->load->view('obras', $data);
		$this->load->view('layout/footer');
	}

	function ver_proyecto(){
		echo $id_proyecto = $this->uri->segment(2);

	}

	public function ver_proyectos()
	{
		$data['posts'] = $this->post_model->obtener_proyectos(10);

		$this->load->view('layout/head');
		$this->load->view('proyectos', $data);
		$this->load->view('layout/footer');
	}

	public function ver_nosotros()
	{
		$this->load->view('layout/head');
		$this->load->view('nosotros');
		$this->load->view('layout/footer');
	}


	function ver_novedad(){
		echo $id_novedad = $this->uri->segment(2);

	}

	public function ver_novedades()
	{
		$data['posts'] = array();
		$data['posts'] = $this->post_model->obtener_novedades(10);

		$this->load->view('layout/head');
		$this->load->view('novedades', $data);
		$this->load->view('layout/footer');
	}

	public function ver_contacto()
	{
		$this->load->view('layout/head');
		$this->load->view('contacto');
		$this->load->view('layout/footer');
	}

}
