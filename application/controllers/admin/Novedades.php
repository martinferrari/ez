<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Novedades extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
	}

	public function ver_novedades(){
		$data = array();
		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin');
		$this->load->view('admin/novedades',$data);
		$this->load->view('layout/footer_admin');
	}

 

}