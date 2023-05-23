<?php ob_start(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/usuarios_model');
	}


	function altaUsuario(){
		$nombre = $this->input->post("nombre");
		$pass = md5($this->input->post("pass"));
		$tipo = $this->input->post("tipo");
		$estado = $this->input->post("estado");

		$insert = $this->usuarios_model->alta_usuario($nombre, $pass, $tipo, $estado);

		if($insert != 0):
			establecer_mensaje_emergente("Usuario agregado con �xito", "success");
		else:
			establecer_mensaje_emergente("Se produjo un error", "error");
		endif;
		redirect("admin/usuarios");
	}
	
	/**
	*	Carga los datos del usuario al iniciar sesion
	*/
	function cargar_datos_de_sesion($data_de_usuario){
		$newdata = array(
			'logged_user_id'               => $data_de_usuario[0]['id_usuario'],
			'logged_user_nombre'           => $data_de_usuario[0]['nombre'],
			'logged_user_tipo'             => $data_de_usuario[0]['tipo']
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
				$data_de_usuario[0]['tipo'] = $validar_login[0]['tipo'];
		
				//carga el array de sesion
				$this->cargar_datos_de_sesion($data_de_usuario);
				
				redirect("admin/home");
			else:
				//el usuario esta inactivo
				$this->session->set_userdata(array('usuario_inactivo' => "El usuario no est� activo"));
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
	

	
	public function modificacionPassword(){
		$id = $this->input->post("mp_id");
		$pass = $this->input->post("mp_pass");
		$pass2 = $this->input->post("mp_pass2");
		
		if($pass != $pass2):
			establecer_mensaje_emergente("Las contrase�as no coinciden", "error");
			redirect("admin/usuarios");
		endif;
		
		$pass = md5($pass);

		$update = $this->usuarios_model->modificacion_password($id, $pass);

		if($update != 0):
			establecer_mensaje_emergente("Usuario modificado con �xito", "success");
		else:
			establecer_mensaje_emergente("Se produjo un error", "error");
		endif;
		redirect("admin/usuarios");
	}


	public function modificacionUsuario(){
		$id = $this->input->post("mu_id");
		$nombre = $this->input->post("mu_nombre");
		$pass = $this->input->post("mu_pass");
		$tipo = $this->input->post("mu_tipo");
		$estado = $this->input->post("mu_estado");

		$update = $this->usuarios_model->modificacion_usuario($id, $nombre, $pass, $tipo, $estado);

		if($update != 0):
			establecer_mensaje_emergente("Usuario modificado con �xito", "success");
		else:
			establecer_mensaje_emergente("Se produjo un error", "error");
		endif;
		redirect("admin/usuarios");
	}

	public function ver_home(){
		$data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
		$data['mensaje_emergente'] = obtener_mensaje_emergente();

		$this->load->model('admin/obras_model');
		$this->load->model('admin/proyectos_model');
		$this->load->model('admin/novedades_model');
		$this->load->model('admin/nosotros_model');

		$data['cantidad_obras'] = $this->obras_model->obtener_cantidad_publicados();
		$data['cantidad_proyectos'] = $this->proyectos_model->obtener_cantidad_publicados();
		$data['cantidad_novedades'] = $this->novedades_model->obtener_cantidad_publicados();
		$data['cantidad_nosotros'] = $this->nosotros_model->obtener_cantidad_publicados();

		$data['conf_obras'] = $this->obras_model->get_configuracion();
		$data['conf_proyectos'] = $this->proyectos_model->get_configuracion();
		$data['conf_novedades'] = $this->novedades_model->get_configuracion();
		$data['conf_home'] = $this->obras_model->get_configuracion_home();


		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/home',$data);
		$this->load->view('layout/footer_admin');
	}

    public function ver_login(){
		$data['mensaje_emergente'] = obtener_mensaje_emergente();
        $this->load->view('layout/head_admin');
		$this->load->view('admin/login', $data);
		$this->load->view('layout/footer_admin');
    } //ver_login



	public function ver_usuarios(){
		$data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
		$data['mensaje_emergente'] = obtener_mensaje_emergente();

		$data['usuarios'] = $this->usuarios_model->obtener_usuarios();

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/usuarios',$data);
		$this->load->view('layout/footer_admin');
		$this->load->view('admin/js/usuarios');
	}

}