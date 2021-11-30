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
		endforeach;

		$data['obra'] = $obra[0];
		$data['visuales'] = $visuales;
		$data['destacada'] = $destacada;

		
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
