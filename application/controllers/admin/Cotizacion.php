<?php ob_start(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cotizacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/cotizacion_model');
	}


	function obtener_detalle(){
		$id = $this->input->post('id');
        $detalle = $this->cotizacion_model->obtener_detalle($id);

		header('Content-Type: application/json');
		echo json_encode( $detalle  , JSON_UNESCAPED_UNICODE);
		return;
		
	}

	function modificacion_cotizacion(){
		$cant_cotizada = 0;
		foreach($_POST['id_detalle'] as $k => $linea):
			$id_detalle = $_POST['id_detalle'][$k];
			$cantidad = $_POST['cantidad_cotizada'][$k];
			$unidad = $_POST['unidad_cotizada'][$k];
			$precio = $_POST['precio_cotizado'][$k];
					
			$modificacion = $this->cotizacion_model->modificacion_detalle_cotizacion($id_detalle, $cantidad, $unidad, $precio);

			if($modificacion == 1):
				$cant_cotizada++;
			endif;
		endforeach;

		if($cant_cotizada > 0):
			$modificacion_cotizacion = $this->cotizacion_model->set_cotizacion_cotizada($_POST['id']);
			establecer_mensaje_emergente("Cotizacion modificada", "success");
		else:
			//establecer_mensaje_emergente("", "error");
		endif;
		redirect("admin/cotizaciones");
	}


    function ver_cotizaciones(){
        $data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
		$data['mensaje_emergente'] = obtener_mensaje_emergente();
        $data['cotizaciones'] = $this->cotizacion_model->obtener_cotizaciones();

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/cotizaciones',$data);
		$this->load->view('layout/footer_admin');
		$this->load->view('admin/js/cotizaciones',$data);
    }

	

}