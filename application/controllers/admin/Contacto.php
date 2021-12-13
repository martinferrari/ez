<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/contacto_model');
	}


    function ver_entrevistas(){
        $data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
        $data['entrevistas'] = $this->contacto_model->obtener_entrevistas();

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/entrevistas',$data);
		$this->load->view('layout/footer_admin');
		$this->load->view('admin/js/entrevistas',$data);
    }

	function ver_trabaja_con_nosotros(){
        $data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
        $data['trabaja'] = $this->contacto_model->obtener_trabaja();

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/trabaja',$data);
		$this->load->view('layout/footer_admin');
		$this->load->view('admin/js/trabaja',$data);
    }

}