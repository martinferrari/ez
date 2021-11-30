<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/usuarios_model');

	}

	
	/**
	*	Carga los datos del usuario al iniciar sesion
	*/
	function cargar_datos_de_sesion($data_de_usuario){
		$newdata = array(
			'logged_user_id'            	=> $data_de_usuario[0]['id_usuario'],
			'logged_user_nombre'           => $data_de_usuario[0]['nombre']
		);

		$this->session->set_userdata($newdata);		
		
	}//cargar_datos_de_sesion



	/*
	*	Inicia sesión
	*/
	function login(){
	
		$user = $this->input->post("user");
		$pass = md5($this->input->post("pass"));
		
		$validar_login = $this->usuarios_model->validar_login($user, $pass);

		if(is_array($validar_login) && count($validar_login) ==1 ):
			if($validar_login[0]["estado"] == 1):
				$data_de_usuario[0]['id_usuario'] = $validar_login[0]['id'];
				$data_de_usuario[0]['nombre'] = $validar_login[0]['nombre'];
		
				//carga el array de sesion
				$this->cargar_datos_de_sesion($data_de_usuario);
				
				redirect("admin/home");
			else:
				//el usuario esta inactivo
				$this->session->set_userdata(array('usuario_inactivo' => "El usuario no está activo"));
				redirect("admin");
			endif; 
			
		else:
			$this->session->set_userdata(array('usuario_no_existe' => "Datos incorrectos"));
			redirect("admin");
		endif; 
		
	}


	/**
	*	Cierra sesión
	*/
	function logout(){
		$this->session->sess_destroy();
		redirect("admin");
	} //logout
	

	public function ver_home(){
		$data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/home',$data);
		$this->load->view('layout/footer_admin');
	}

    public function ver_login(){
		
		$data = array();
        $this->load->view('layout/head_admin');
		$this->load->view('admin/login', $data);
		$this->load->view('layout/footer_admin');
    } //ver_login

}