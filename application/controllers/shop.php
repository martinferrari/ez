<?php ob_start(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/murvi_model');
		$this->load->model('admin/visuales_mosaico_model');
		$this->load->model('admin/cotizacion_model');
		$this->load->library('session');
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

    public function index(){
        $idioma = $this->ver_idioma();
        $data['idioma'] = $idioma;

		$this->load->view('layout/head', $data);
		$this->load->view('shop/index', $data);
		$this->load->view('layout/footer', $data);
	}


	function guardar_cotizacion($datos){
		$cabecera = $this->cotizacion_model->guardar_cabecera($datos);
		if($cabecera > 0):
			$detalles = '';
			
			foreach($datos['id'] as $k => $id):
				$detalles .= "(".$cabecera.','.$id.", '".$datos['cantidad'][$k]."', '".$datos['unidad'][$k]."' ),";	
			endforeach;
			$detalles = substr($detalles, 0, -1);
			$detalle = $this->cotizacion_model->guardar_detalle($detalles);
			
		endif;
	}


	function solicitar_cotizacion(){
		$this->load->helper('ez_email_helper');

		$nombre = preg_replace("/[^a-zA-Z0-9áéíóúñÁÉÍÓÚÑ@._ -]+/", "", $_POST['inputName']);
		$telefono = preg_replace("/[^0-9]+/", "", $_POST['inputTelefono']);
		$email = preg_replace("/[^a-zA-Z0-9áéíóúñÁÉÍÓÚÑ@._-]+/", "", $_POST['inputEmail']);

		$datos['nombre'] = $nombre;
		$datos['telefono'] = $telefono;
		$datos['email'] = $email;
		$datos['id'] = $_POST['id'];
		$datos['productos'] = $_POST['productos'];
		$datos['cantidad'] = $_POST['cantidad'];
		$datos['unidad'] = $_POST['unidad'];

		$count_prod = $_POST['productos'];
		if(count($count_prod) > 0):
		
			$data['titulo'] = "Solicitud de Cotización de Mosaicos Murvi";
			$mensaje = "La solicitud fue realizada por: <br>";
			$mensaje .= "Nombre y apellido: ".$nombre."<br> Telefono: ".$telefono."<br> Email: ".$email;
			$mensaje .= "<br>Productos: ";
			$mensaje .= "<ul>";
			foreach($_POST['productos'] as $k => $producto):
				$mensaje .= "<li> ".$producto." - Cantidad: ".$_POST['cantidad'][$k]." ".$_POST['unidad'][$k];
			endforeach;
			$mensaje .= "</ul>";

			$data['mensaje'] = $mensaje;
			$this->guardar_cotizacion($datos);

			$enviar_mail = enviar_email($data); //ez_email_helper
			redirect('shop/murvi');

		endif;
	}


    public function ver_catalogo_murvi(){
        $idioma = $this->ver_idioma();
        $data['idioma'] = $idioma;

        $data['productos'] = $this->murvi_model->obtener_catalogo();

		$this->load->view('layout/head', $data);
		$this->load->view('shop/catalogo_murvi', $data);
		$this->load->view('layout/footer', $data);
		$this->load->view('shop/js/catalogo_murvi', $data);
	}


}
