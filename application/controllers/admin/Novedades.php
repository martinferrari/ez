<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Novedades extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/novedades_model');
		$this->load->model('admin/visuales_model');
	}


	function altaNovedad(){
		$logged_user = $this->session->all_userdata();

		$titulo = reg_expresion($this->input->post('titulo'));
		$descripcion = reg_expresion($this->input->post('descripcion'));
		$categoria = $this->input->post('categoria');
		$estado = $this->input->post('estado');

		$usuario_alta = $logged_user['logged_user_id'];
		$fecha_alta = date("Y-m-d H:i:s");

		$insert = $this->novedades_model->alta_novedad($titulo, $descripcion, $usuario_alta, $fecha_alta, $categoria, $estado);

		if($insert != 0):
			$id_novedad = $insert;
		else:
			establecer_mensaje_emergente("Se produjo un error", "error");
			redirect("admin/novedades");
		endif;

		if (!file_exists('_res/visuales/novedades')) {
			mkdir('_res/visuales/novedades/', 0777, true);
		}
		mkdir("_res/visuales/novedades/".$id_novedad, 0777);

		$errores = 0;
		//imagenes
		$imagenes = $_FILES['imagenes'];
		$count_imagenes = count($_FILES['imagenes']['name']);
		for ($i=0; $i<$count_imagenes; $i++) {
			if(!empty($_FILES['imagenes']['name'][$i])):

				$upload_path = "_res/visuales/novedades/".$id_novedad;

				$nombre_imagen = "novedad_".$id_novedad."_".$i;

				$_FILES['imagen']['name'] = $imagenes['name'][$i];
				echo $_FILES['imagen']['type'] = $imagenes['type'][$i];
				$_FILES['imagen']['tmp_name'] = $imagenes['tmp_name'][$i];
				$_FILES['imagen']['error'] = $imagenes['error'][$i];
				$_FILES['imagen']['size'] = $imagenes['size'][$i];
			
				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|avi|mpeg';
				$config['max_size'] = '0';
				
				$config['file_name'] = $nombre_imagen;

				$this->load->library('upload',$config); 
				if($this->upload->do_upload('imagen')):
					$uploadData = $this->upload->data();
					$imagen_subida = $upload_path."/".$uploadData['file_name'];

					$destacada = ($i==0) ? 1 : 0;
					
					$insert_visual = $this->visuales_model->alta_visual($id_novedad, $imagen_subida, $destacada, 1);
					if($insert_visual == 0):
						establecer_mensaje_emergente("Ocurri� un error al intentar cargar la imagen.", "error");
						$errores++;
					endif;
				else:
					$imageError =  $this->upload->display_errors();
					establecer_mensaje_emergente("Ocurri� un error al intentar cargar la imagen. Error: ".$imageError, "error");
					redirect("admin/novedades");
				endif;				
			endif;	
		}

		if($errores > 0):
			$this->borrar_novedad($id_novedad);
		endif;


		if($errores == 0):
			establecer_mensaje_emergente("Novedad agregada con �xito", "success");
		endif;

		$this->novedades_model->alta_traduccion($id_novedad, null, null);

		redirect("admin/novedades");


	}

	function borrar_novedad($id_novedad = null){
		$id = ($id_novedad != null) ? $id_novedad : $this->uri->segment(3);
		
		$baja = $this->novedades_model->baja_novedad($id);

		if($baja == 1):
			establecer_mensaje_emergente("Novedad eliminada", "success");
			$dir = "_res/visuales/novedades/".$id;
			rmdir_recursive($dir); //en helper
		else:
			establecer_mensaje_emergente("La novedad no pudo eliminarse", "error");
		endif;
		
		redirect("admin/novedades");
	}


	function get_visuales_by_id_novedad($id_novedad = null,$tipo = null){
		$id_novedad = ($id_novedad == null) ? $this->input->post('id_novedad') : $id_novedad;
		$tipo = ($tipo == null) ? $this->input->post('tipo') : $tipo;
		$visuales = $this->visuales_model->get_visuales_by_id_post($id_novedad,$tipo);
	
		header('Content-Type: application/json');
		echo json_encode( $visuales  , JSON_UNESCAPED_UNICODE);
		return;
	}

	function guardar_configuracion(){
		$this->sesiones->valida_sesion();

		$cantidad = $this->input->post('cant_novedades');
		$orden = $this->input->post('orden_novedades');

		$update_conf = $this->novedades_model->guardar_configuracion($cantidad, $orden);
		redirect("admin/home");
	}


	function modificacion_imagenes_novedad(){
		
		$id_novedad = $this->input->post('mei_id');
		$imagenes = $_FILES['mei_imagenes'];
		$destacada = $_POST['en_foto_destacada'];

		if(isset($_POST['en_borrar_foto'])):
			$a_borrar = $_POST['en_borrar_foto'];
			$imagenes_a_borrar = $_POST['en_foto_actual'];

			foreach($imagenes_a_borrar as $k => $v):
				if($a_borrar[$k] == 1):
					unlink($v);
					$this->visuales_model->borrar_foto($id_novedad, $v);
				endif;
			endforeach;
		endif;

		$count_imagenes = count($_FILES['mei_imagenes']['size']);
		$errores = 0;	
		if($count_imagenes > 0):
			for ($i=0; $i<$count_imagenes; $i++) :
				if(!empty($_FILES['mei_imagenes']['name'][$i])):
					
					if (!file_exists('_res/visuales/novedades')) {
						mkdir('_res/visuales/novedades/', 0777, true);
					}
					if (!file_exists('_res/visuales/novedades/'.$id_novedad)) {
						mkdir("_res/visuales/novedades/".$id_novedad, 0777);
					}
					$milliseconds = round(microtime(true) * 1000);
					$upload_path = "_res/visuales/novedades/".$id_novedad;
					$nombre_imagen = "obra_".$id_novedad.$milliseconds."_".$i;

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

						$insert_visual = $this->visuales_model->alta_visual($id_novedad, $imagen_subida, 0, 1);
						if($insert_visual == 0):
							establecer_mensaje_emergente("Ocurri� un error al intentar cargar la imagen.", "error");
							$errores++;
						endif;
					else:
						$imageError =  $this->upload->display_errors();
						establecer_mensaje_emergente("Ocurri� un error al intentar cargar la imagen. Error: ".$imageError, "error");
						redirect("admin/novedades");
					endif;
				endif;
			
			endfor;

			$this->visuales_model->unset_destacada($id_novedad);
			$this->visuales_model->set_destacada($id_novedad,$destacada);

			establecer_mensaje_emergente("Imagenes editadas", "success");
			redirect("admin/novedades");
		endif;
	}



	function modificacion_traduccion(){
		$id = $this->input->post('id');
		$titulo = $this->input->post('titulo');
		$descripcion = $this->input->post('descripcion');

		$editado = $this->novedades_model->modificacion_traduccion($id, $titulo, $descripcion);

		if($editado == 1):
			establecer_mensaje_emergente("Traducción modificada", "success");
		else:
			establecer_mensaje_emergente("La Traducción no pudo modificarse", "error");
		endif;
		redirect("admin/novedades");
	}




	function modificacion_videos_novedad(){
		$id_novedad = $this->input->post('mev_id');
		$imagenes = $_FILES['mev_videos'];

		if(isset($_POST['en_borrar_video'])):
			$a_borrar = $_POST['en_borrar_video'];
			$videos_a_borrar = $_POST['en_video_actual'];

			foreach($videos_a_borrar as $k => $v):
				if($a_borrar[$k] == 1):
					unlink($v);
					$this->visuales_model->borrar_foto($id_novedad, $v);
				endif;
			endforeach;
		endif;

		$count_videos = count($_FILES['mev_videos']['size']);
		$errores = 0;	
		if($count_videos > 0):
			for ($i=0; $i<$count_videos; $i++) :
				if(!empty($_FILES['mev_videos']['name'][$i])):
					
					if (!file_exists('_res/visuales/novedades')) {
						mkdir('_res/visuales/novedades/', 0777, true);
					}
					if (!file_exists('_res/visuales/novedades/'.$id_novedad)) {
						mkdir("_res/visuales/novedades/".$id_novedad, 0777);
					}
					$milliseconds = round(microtime(true) * 1000);
					$upload_path = "_res/visuales/novedades/".$id_novedad;
					$nombre_imagen = "obra_".$id_novedad.$milliseconds."_".$i;

					$_FILES['imagen']['name'] = $imagenes['name'][$i];
					$_FILES['imagen']['type'] = $imagenes['type'][$i];
					$_FILES['imagen']['tmp_name'] = $imagenes['tmp_name'][$i];
					$_FILES['imagen']['error'] = $imagenes['error'][$i];
					$_FILES['imagen']['size'] = $imagenes['size'][$i];
				
					$config['upload_path'] = $upload_path;
					$config['allowed_types'] = 'avi|mp4|mpeg|mov';
					$config['max_size'] = '0';
					
					$config['file_name'] = $nombre_imagen;

					$this->load->library('upload',$config); 
					if($this->upload->do_upload('imagen')):
						$uploadData = $this->upload->data();
						$imagen_subida = $upload_path."/".$uploadData['file_name'];

						$insert_visual = $this->visuales_model->alta_visual($id_novedad, $imagen_subida, 0, 3);
						if($insert_visual == 0):
							establecer_mensaje_emergente("Ocurri� un error al intentar cargar el video.", "error");
							$errores++;
						endif;
					else:
						$imageError =  $this->upload->display_errors();
						establecer_mensaje_emergente("Ocurri� un error al intentar cargar elvideo. Error: ".$imageError, "error");
						redirect("admin/novedades");
					endif;
				endif;
			
			endfor;
			establecer_mensaje_emergente("Imagenes editadas", "success");
			redirect("admin/novedades");
		endif;
	}




	function modificacion_novedad(){
		$logged_user = $this->session->all_userdata();

		$id = $this->input->post("en_id");
		$titulo = reg_expresion($this->input->post("en_titulo"));
		$descripcion = reg_expresion($this->input->post("en_descripcion"));
		$categoria = $this->input->post("en_categoria");
		$estado = $this->input->post("en_estado");

		$usuario_modif = $logged_user['logged_user_id'];
		$fecha_modif = date("Y-m-d H:i:s");

		$editado = $this->novedades_model->modificacionNovedad($id, $titulo, $descripcion, $categoria, $estado, $usuario_modif, $fecha_modif);

		if($editado == 1):
			establecer_mensaje_emergente("Obra modificada", "success");
		else:
			establecer_mensaje_emergente("La obra no pudo modificarse", "error");
		endif;
		redirect("admin/novedades");

	}



	function obtener_traduccion(){
		$id = $this->input->post('id');
		$traduccion = $this->novedades_model->obtener_traduccion($id);

		header('Content-Type: application/json');
		echo json_encode( $traduccion  , JSON_UNESCAPED_UNICODE);
		return;
	}


	public function ver_novedades(){
		$data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
		$data['mensaje_emergente'] = obtener_mensaje_emergente();
		$novedades = $this->novedades_model->obtener_novedades();

		//se fija si la novedad tiene imagen destacada
		foreach($novedades as $k =>$v):
			$tiene_destacada = $this->visuales_model->tiene_destacada($v['id']);
			$novedades[$k]['tiene_destacada'] = $tiene_destacada[0]['tiene'];
		endforeach;
		
		$categorias = $this->novedades_model->obtener_categorias();

		$data['novedades'] = $novedades;
		$data['categorias'] = $categorias;

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/novedades',$data);
		$this->load->view('layout/footer_admin');
		$this->load->view('admin/js/novedades',$data);
	}

 

}