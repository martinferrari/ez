<?php ob_start(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Murvi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/murvi_model');
		$this->load->model('admin/visuales_mosaico_model');
	}



	function alta_producto(){
		$alta = $this->murvi_model->alta_producto($_POST);

		if($alta != 0):
			$id_mosaico = $alta;
		else:
			establecer_mensaje_emergente("Se produjo un error", "error");
			redirect("admin/nosotros");
		endif;

		if (!file_exists('_res/visuales/shop')) {
			mkdir('_res/visuales/shop/', 0777, true);
		}
		mkdir("_res/visuales/shop/".$id_mosaico, 0777);

		$errores = 0;

		//imagenes
		$imagenes = $_FILES['imagenes'];
		$count_imagenes = count($_FILES['imagenes']['name']);
		for ($i=0; $i<$count_imagenes; $i++) {
			if(!empty($_FILES['imagenes']['name'][$i])):

				$upload_path = "_res/visuales/shop/".$id_mosaico;

				$nombre_imagen = "shop".$id_mosaico."_".$i;

				$_FILES['imagen']['name'] = $imagenes['name'][$i];
				$_FILES['imagen']['type'] = $imagenes['type'][$i];
				$_FILES['imagen']['tmp_name'] = $imagenes['tmp_name'][$i];
				$_FILES['imagen']['error'] = $imagenes['error'][$i];
				$_FILES['imagen']['size'] = $imagenes['size'][$i];
			
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '0';
				
				$config['file_name'] = $nombre_imagen;

				$this->load->library('upload',$config); 
				if($this->upload->do_upload('imagen')):
					$uploadData = $this->upload->data();
					$imagen_subida = $upload_path."/".$uploadData['file_name'];

					$destacada = ($i==0) ? 1 : 0;
					
					$insert_visual = $this->visuales_mosaico_model->alta_visual($id_mosaico, $imagen_subida, $destacada,1);
					if($insert_visual == 0):
						establecer_mensaje_emergente("Ocurri&oacute; un error al intentar cargar la imagen.", "error");
						$errores++;
					endif;
				else:
					$imageError =  $this->upload->display_errors();
					establecer_mensaje_emergente("Ocurri&oacute; un error al intentar cargar la imagen. Error: ".$imageError, "error");
					redirect("admin/murvi");
				endif;				
			endif;	
		}

		// if($errores > 0):
		// 	$this->borrar_producto($id_mosaico);
		// endif;

		if($errores == 0):
			establecer_mensaje_emergente("Producto agregado", "success");
		endif;

		redirect("admin/murvi");
		
	}



	function borrar_producto($id_producto = null){
		$id = ($id_producto != null) ? $id_producto : $this->uri->segment(5);
		$baja = $this->murvi_model->baja_producto($id);

		if($baja == 1):
			establecer_mensaje_emergente("Producto eliminado", "success");
			$dir = "_res/visuales/shop/".$id;
			rmdir_recursive($dir); //en helper
		else:
			establecer_mensaje_emergente("El producto no pudo eliminarse", "error");
		endif;
		
		redirect("admin/murvi");
	}




	function get_visuales_by_id_producto(){
		$id = $this->input->post('id');
		$visuales = $this->visuales_mosaico_model->get_visuales_by_id_producto($id);
	
		header('Content-Type: application/json');
		echo json_encode( $visuales  , JSON_UNESCAPED_UNICODE);
		return;
	}


	public function modificacion_producto(){
		
		$modificado = $this->murvi_model->modificacion_producto($_POST);
	
		if($modificado == 1):
			establecer_mensaje_emergente("Producto modificado", "success");
		else:
			establecer_mensaje_emergente("El producto no pudo modificarse", "error");
		endif;
		redirect("admin/murvi");

	}


	function modificacion_imagenes(){
		$id_mosaico = $this->input->post('mei_id');
		$imagenes = $_FILES['mei_imagenes'];
		$destacada = $_POST['eo_foto_destacada'];
		$orden = $_POST['orden'];
		$id_foto = $_POST['eo_id_foto'];		

		if(isset($_POST['eo_borrar_foto'])):
			$a_borrar = $_POST['eo_borrar_foto'];
			$imagenes_a_borrar = $_POST['eo_foto_actual'];

			foreach($imagenes_a_borrar as $k => $v):
				if($a_borrar[$k] == 1):
					unlink($v);
					$this->visuales_mosaico_model->borrar_foto($id_mosaico, $v);
				endif;
			endforeach;
		endif;

		$count_imagenes = count($_FILES['mei_imagenes']['size']);
		$errores = 0;	
		if($count_imagenes > 0):
			for ($i=0; $i<$count_imagenes; $i++) :
				if(!empty($_FILES['mei_imagenes']['name'][$i])):
					
					if (!file_exists('_res/visuales/shop')) {
						mkdir('_res/visuales/shop/', 0777, true);
					}
					if (!file_exists('_res/visuales/shop/'.$id_mosaico)) {
						mkdir("_res/visuales/shop/".$id_mosaico, 0777);
					}
					$milliseconds = round(microtime(true) * 1000);
					$upload_path = "_res/visuales/shop/".$id_mosaico;
					$nombre_imagen = "obra_".$id_mosaico.$milliseconds."_".$i;

					$_FILES['imagen']['name'] = $imagenes['name'][$i];
					$_FILES['imagen']['type'] = $imagenes['type'][$i];
					$_FILES['imagen']['tmp_name'] = $imagenes['tmp_name'][$i];
					$_FILES['imagen']['error'] = $imagenes['error'][$i];
					$_FILES['imagen']['size'] = $imagenes['size'][$i];
				
					$config['upload_path'] = $upload_path;
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '0';
					
					$config['file_name'] = $nombre_imagen;

					$this->load->library('upload',$config); 
					if($this->upload->do_upload('imagen')):
						$uploadData = $this->upload->data();
						$imagen_subida = $upload_path."/".$uploadData['file_name'];

						$insert_visual = $this->visuales_mosaico_model->alta_visual($id_mosaico, $imagen_subida, 0, 1);
						if($insert_visual == 0):
							establecer_mensaje_emergente("Se produjo un error al intentar cargar la imagen.", "error");
							$errores++;
						endif;
					else:
						$imageError =  $this->upload->display_errors();
						establecer_mensaje_emergente("Se produjo  un error al intentar cargar la imagen. Error: ".$imageError, "error");
						redirect("admin/murvi");
					endif;
				endif;
			
			endfor;

			$this->visuales_mosaico_model->unset_destacada($id_mosaico);
			$this->visuales_mosaico_model->set_destacada($id_mosaico,$destacada);

			$cantidad_fotos = count($id_foto);
			for($i=0; $i<$cantidad_fotos; $i++):
				$this->visuales_mosaico_model->set_orden($id_foto[$i],$orden[$i]);
			endfor;

			establecer_mensaje_emergente("Imagenes editadas", "success");
			redirect("admin/murvi");

		endif;
	}




    function ver_catalogo(){
        
        $data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
		$data['mensaje_emergente'] = obtener_mensaje_emergente();
        $data['productos'] = $this->murvi_model->obtener_productos();

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/shop/catalogo_murvi',$data);
		$this->load->view('layout/footer_admin');
		$this->load->view('admin/shop/js/catalogo_murvi',$data);

    }

}