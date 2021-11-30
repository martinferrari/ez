<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/proyectos_model');
		$this->load->model('admin/visuales_model');
	}

	function altaProyecto(){
		$errores = 0;

		$logged_user = $this->session->all_userdata();

		$titulo = $this->input->post('titulo');
		$descripcion = $this->input->post('descripcion');
		$descripcion = preg_replace("/[^a-zA-Z0-9áéíóúñÁÉÍÓÚÑ \n !#%()$.-@\"\']+/", "", $descripcion);
		$descripcion = utf8_encode($descripcion);
		$anio_proyecto = $this->input->post('anio_proyecto');
		$area = $this->input->post('area');
		$proyecto = $this->input->post('proyecto');
		$ejecucion = $this->input->post('ejecucion');
		$construccion_direccion = $this->input->post('construccion');
		$disenio_dim_estruc = $this->input->post('disenio_dim_est');
		$tipologia = $this->input->post('tipologia');
		$disenio_dim_clim = $this->input->post('disenio_dim_clim');
		$ubicacion = $this->input->post('ubicacion');
		$estado = $this->input->post('estado');

		$usuario_alta = $logged_user['logged_user_id'];
		$fecha_alta = date("Y-m-d H:i:s");

		$insert = $this->proyectos_model->alta_proyecto($titulo, $descripcion, $anio_proyecto, $proyecto, $ejecucion, $construccion_direccion, $disenio_dim_estruc, $tipologia, $disenio_dim_clim, $area, $ubicacion, $usuario_alta, $fecha_alta, $estado);

		
		if($insert != 0):
			$id_proyecto = $insert;
		else:
			establecer_mensaje_emergente("Se produjo un error", "error");
			redirect("admin/proyecto");
		endif;

		if (!file_exists('_res/visuales/proyectos')) {
			mkdir('_res/visuales/proyectos/', 0777, true);
		}
		mkdir("_res/visuales/proyectos/".$id_proyecto, 0777);


		//imagenes
		$imagenes = $_FILES['imagenes'];
		$count_imagenes = count($_FILES['imagenes']['name']);
		for ($i=0; $i<$count_imagenes; $i++) {
			if(!empty($_FILES['imagenes']['name'][$i])):

				$upload_path = "_res/visuales/proyectos/".$id_proyecto;

				$nombre_imagen = "proyecto_".$id_proyecto."_".$i;

				$_FILES['imagen']['name'] = $imagenes['name'][$i];
				echo $_FILES['imagen']['type'] = $imagenes['type'][$i];
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
					
					$insert_visual = $this->visuales_model->alta_visual($id_proyecto, $imagen_subida, $destacada, 1);
					if($insert_visual == 0):
						establecer_mensaje_emergente("Ocurrió un error al intentar cargar la imagen.", "error");
						$errores++;
					endif;
				else:
					$imageError =  $this->upload->display_errors();
					establecer_mensaje_emergente("Ocurrió un error al intentar cargar la imagen. Error: ".$imageError, "error");
					redirect("admin/proyectos");
				endif;				
			endif;	
		}

		if($errores > 0):
			$this->borrar_proyecto($id_proyecto);
		endif;


		if($errores == 0):
			establecer_mensaje_emergente("Proyecto agregado con éxito", "success");
		endif;
		redirect("admin/proyectos");

	} //altaproyecto


	function borrar_proyecto($id_proyecto = null){
		$id = ($id_proyecto != null) ? $id_proyecto : $this->uri->segment(3);
		
		$baja = $this->proyectos_model->baja_proyecto($id);

		if($baja == 1):
			establecer_mensaje_emergente("Proyecto eliminado", "success");
			$dir = "_res/visuales/proyectos/".$id;
			rmdir_recursive($dir); //en helper
		else:
			establecer_mensaje_emergente("El proyecto no pudo eliminarse", "error");
		endif;
		
		redirect("admin/proyectos");
	}

	function get_visuales_by_id_proyecto($id_proyecto = null,$tipo = null){
		$id_proyecto = ($id_proyecto == null) ? $this->input->post('id_proyecto') : $id_proyecto;
		$tipo = ($tipo == null) ? $this->input->post('tipo') : $tipo;
		$visuales = $this->visuales_model->get_visuales_by_id_post($id_proyecto,$tipo);
	
		header('Content-Type: application/json');
		echo json_encode( $visuales  , JSON_UNESCAPED_UNICODE);
		//echo json_encode( $tipo  , JSON_UNESCAPED_UNICODE);
		return;
	}

	function modificacion_imagenes_proyecto(){
		
		$id_proyecto = $this->input->post('mei_id');
		$imagenes = $_FILES['mei_imagenes'];
		$destacada = $_POST['eo_foto_destacada'];

		if(isset($_POST['eo_borrar_foto'])):
			$a_borrar = $_POST['eo_borrar_foto'];
			$imagenes_a_borrar = $_POST['eo_foto_actual'];

			foreach($imagenes_a_borrar as $k => $v):
				if($a_borrar[$k] == 1):
					unlink($v);
					$this->visuales_model->borrar_foto($id_proyecto, $v);
				endif;
			endforeach;
		endif;

		$count_imagenes = count($_FILES['mei_imagenes']['size']);
		$errores = 0;	
		if($count_imagenes > 0):
			for ($i=0; $i<$count_imagenes; $i++) :
				if(!empty($_FILES['mei_imagenes']['name'][$i])):
					
					if (!file_exists('_res/visuales/proyectos')) {
						mkdir('_res/visuales/proyectos/', 0777, true);
					}
					if (!file_exists('_res/visuales/proyectos/'.$id_proyecto)) {
						mkdir("_res/visuales/proyectos/".$id_proyecto, 0777);
					}
					$milliseconds = round(microtime(true) * 1000);
					$upload_path = "_res/visuales/proyectos/".$id_proyecto;
					$nombre_imagen = "proyecto_".$id_proyecto.$milliseconds."_".$i;

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

						$insert_visual = $this->visuales_model->alta_visual($id_proyecto, $imagen_subida, 0, 1);
						if($insert_visual == 0):
							establecer_mensaje_emergente("Ocurrió un error al intentar cargar la imagen.", "error");
							$errores++;
						endif;
					else:
						$imageError =  $this->upload->display_errors();
						establecer_mensaje_emergente("Ocurrió un error al intentar cargar la imagen. Error: ".$imageError, "error");
						redirect("admin/proyectos");
					endif;
				endif;
			
			endfor;

			$this->visuales_model->unset_destacada($id_proyecto);
			$this->visuales_model->set_destacada($id_proyecto,$destacada);

			establecer_mensaje_emergente("Imagenes editadas", "success");
			redirect("admin/proyectos");
		endif;
	}

	function modificacion_videos_proyecto(){
		$id_proyecto = $this->input->post('mev_id');
		$imagenes = $_FILES['mev_videos'];

		if(isset($_POST['eo_borrar_video'])):
			$a_borrar = $_POST['eo_borrar_video'];
			$videos_a_borrar = $_POST['eo_video_actual'];

			foreach($videos_a_borrar as $k => $v):
				if($a_borrar[$k] == 1):
					unlink($v);
					$this->proyectos_model->borrar_foto($id_proyecto, $v);
				endif;
			endforeach;
		endif;

		$count_videos = count($_FILES['mev_videos']['size']);
		$errores = 0;	
		if($count_videos > 0):
			for ($i=0; $i<$count_videos; $i++) :
				if(!empty($_FILES['mev_videos']['name'][$i])):
					
					if (!file_exists('_res/visuales/proyectos')) {
						mkdir('_res/visuales/proyectos/', 0777, true);
					}
					if (!file_exists('_res/visuales/proyectos/'.$id_proyecto)) {
						mkdir("_res/visuales/proyectos/".$id_proyecto, 0777);
					}
					$milliseconds = round(microtime(true) * 1000);
					$upload_path = "_res/visuales/proyectos/".$id_proyecto;
					$nombre_imagen = "proyecto_".$id_proyecto.$milliseconds."_".$i;

					$_FILES['imagen']['name'] = $imagenes['name'][$i];
					$_FILES['imagen']['type'] = $imagenes['type'][$i];
					$_FILES['imagen']['tmp_name'] = $imagenes['tmp_name'][$i];
					$_FILES['imagen']['error'] = $imagenes['error'][$i];
					$_FILES['imagen']['size'] = $imagenes['size'][$i];
				
					$config['upload_path'] = $upload_path;
					$config['allowed_types'] = 'avi|mp4|mpeg';
					$config['max_size'] = '0';
					
					$config['file_name'] = $nombre_imagen;

					$this->load->library('upload',$config); 
					if($this->upload->do_upload('imagen')):
						$uploadData = $this->upload->data();
						$imagen_subida = $upload_path."/".$uploadData['file_name'];

						$insert_visual = $this->visuales_model->alta_visual($id_proyecto, $imagen_subida, 0, 3);
						if($insert_visual == 0):
							establecer_mensaje_emergente("Ocurrió un error al intentar cargar el video.", "error");
							$errores++;
						endif;
					else:
						$imageError =  $this->upload->display_errors();
						establecer_mensaje_emergente("Ocurrió un error al intentar cargar elvideo. Error: ".$imageError, "error");
						redirect("admin/proyectos");
					endif;
				endif;
			
			endfor;


			establecer_mensaje_emergente("Imagenes editadas", "success");
			redirect("admin/proyectos");
		endif;
	}



	public function modificacionProyecto(){
		$logged_user = $this->session->all_userdata();

		$id = $this->input->post("me_id");
		$titulo = $this->input->post("me_titulo");
		$descripcion = $this->input->post("me_descripcion");
		$descripcion = preg_replace("/[^a-zA-Z0-9áéíóúñÁÉÍÓÚÑ \n !#%()$.-@\"\']+/", "", $descripcion);
		$descripcion = utf8_encode($descripcion);
		$anio_proyecto = $this->input->post('me_anio_proyecto');
		$area = $this->input->post('me_area');
		$proyecto = $this->input->post('me_proyecto');
		$ejecucion = $this->input->post('me_ejecucion');
		$construccion_direccion = $this->input->post('me_construccion_direccion');
		$disenio_dim_estruc = $this->input->post('me_disenio_dim_estruc');
		$tipologia = $this->input->post('me_tipologia');
		$disenio_dim_clim = $this->input->post('me_disenio_dim_clim');
		$ubicacion = $this->input->post('me_ubicacion');
		$estado = $this->input->post('me_estado');

		$usuario_modif = $logged_user['logged_user_id'];
		$fecha_modif = date("Y-m-d H:i:s");

		$editado = $this->proyectos_model->modificacionProyecto($id, $titulo, $descripcion, $anio_proyecto, $proyecto, $ejecucion, $construccion_direccion, $disenio_dim_estruc, $tipologia, $disenio_dim_clim, $area, $ubicacion, $usuario_modif, $fecha_modif, $estado);

	
		if($editado == 1):
			establecer_mensaje_emergente("Proyecto modificado", "success");
		else:
			establecer_mensaje_emergente("El proyecto no pudo modificarse", "error");
		endif;
		redirect("admin/proyectos");

	} //modificacionProyecto



	public function ver_proyectos(){
		$data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();

		$proyectos = $this->proyectos_model->obtener_proyectos();
		$data['mensaje_emergente'] = obtener_mensaje_emergente();

		//se fija si la obra tiene imagen destacada
		foreach($proyectos as $k =>$v):
			$tiene_destacada = $this->visuales_model->tiene_destacada($v['id']);
			$proyectos[$k]['tiene_destacada'] = $tiene_destacada[0]['tiene'];
		endforeach;
		
		$data['proyectos'] = $proyectos;

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/proyectos',$data);
		$this->load->view('layout/footer_admin',$data);
		$this->load->view('admin/js/proyectos.php');
	}



}