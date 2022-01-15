<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obras extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/obras_model');
		$this->load->model('admin/visuales_model');
	}

	function altaObra(){
		
		$errores = 0;

		$logged_user = $this->session->all_userdata();

		$titulo = reg_expresion($this->input->post('titulo'));
		$descripcion = reg_expresion($this->input->post('descripcion'));
		$anio_proyecto = reg_expresion($this->input->post('anio_proyecto'));
		$area = reg_expresion($this->input->post('area'));
		$proyecto = reg_expresion($this->input->post('proyecto'));
		$ejecucion = reg_expresion($this->input->post('ejecucion'));
		$construccion_direccion = reg_expresion($this->input->post('construccion'));
		$disenio_dim_estruc = reg_expresion($this->input->post('disenio_dim_est'));
		$tipologia = reg_expresion($this->input->post('tipologia'));
		$disenio_dim_clim = reg_expresion($this->input->post('disenio_dim_clim'));
		$ubicacion = reg_expresion($this->input->post('ubicacion'));
		$estado = reg_expresion($this->input->post('estado'));

		$direccion_tecnica = reg_expresion($this->input->post('direccion_tecnica'));
		$asist_tec_obra = reg_expresion($this->input->post('asist_tec_obra'));
		$estructuras = reg_expresion($this->input->post('estructuras'));
		$instalaciones = reg_expresion($this->input->post('instalaciones'));
		$gestion_documentacion = reg_expresion($this->input->post('gestion_documentacion'));
		$sup_terreno = reg_expresion($this->input->post('sup_terreno'));
		$sup_cubierta = reg_expresion($this->input->post('sup_cubierta'));
		$anio_finalizacion = reg_expresion($this->input->post('anio_finalizacion'));
		$fotografia = reg_expresion($this->input->post('fotografia'));

		$usuario_alta = $logged_user['logged_user_id'];
		$fecha_alta = date("Y-m-d H:i:s");
		
		$insert = $this->obras_model->alta_obra($titulo, $descripcion, $anio_proyecto, $proyecto, $ejecucion, $construccion_direccion, $disenio_dim_estruc, $tipologia, $disenio_dim_clim, $area, $ubicacion, $usuario_alta, $fecha_alta, $estado, $direccion_tecnica, $asist_tec_obra,$estructuras, $instalaciones,$gestion_documentacion, $sup_terreno,$sup_cubierta, $anio_finalizacion, $fotografia);

		if($insert != 0):
			$id_obra = $insert;
		else:
			establecer_mensaje_emergente("Se produjo un error", "error");
			redirect("admin/obra");
		endif;

		if (!file_exists('_res/visuales/obras')) {
			mkdir('_res/visuales/obras/', 0777, true);
		}
		mkdir("_res/visuales/obras/".$id_obra, 0777);


		//imagenes
		$imagenes = $_FILES['imagenes'];
		$count_imagenes = count($_FILES['imagenes']['name']);
		for ($i=0; $i<$count_imagenes; $i++) {
			if(!empty($_FILES['imagenes']['name'][$i])):

				$upload_path = "_res/visuales/obras/".$id_obra;

				$nombre_imagen = "obra_".$id_obra."_".$i;

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
					
					$insert_visual = $this->visuales_model->alta_visual($id_obra, $imagen_subida, $destacada, 1);
					if($insert_visual == 0):
						establecer_mensaje_emergente("Ocurri� un error al intentar cargar la imagen.", "error");
						$errores++;
					endif;
				else:
					$imageError =  $this->upload->display_errors();
					establecer_mensaje_emergente("Ocurri� un error al intentar cargar la imagen. Error: ".$imageError, "error");
					redirect("admin/obras");
				endif;				
			endif;	
		}

		if($errores > 0):
			$this->borrar_obra($id_obra);
		endif;

		$this->obras_model->alta_traduccion($id_obra, null, null, null, null, null);

		if($errores == 0):
			establecer_mensaje_emergente("Obra agregada con �xito", "success");
		endif;
		redirect("admin/obras");

	} //altaObra


	function borrar_obra($id_obra = null){
		$id = ($id_obra != null) ? $id_obra : $this->uri->segment(3);
		
		$baja = $this->obras_model->baja_obra($id);

		if($baja == 1):
			establecer_mensaje_emergente("Obra eliminada", "success");
			$dir = "_res/visuales/obras/".$id;
			rmdir_recursive($dir); //en helper
		else:
			establecer_mensaje_emergente("La obra no pudo eliminarse", "error");
		endif;
		
		redirect("admin/obras");
	}



	function get_visuales_by_id_obra($id_obra = null,$tipo = null){
		$id_obra = ($id_obra == null) ? $this->input->post('id_obra') : $id_obra;
		$tipo = ($tipo == null) ? $this->input->post('tipo') : $tipo;
		$visuales = $this->visuales_model->get_visuales_by_id_post($id_obra,$tipo);
	
		header('Content-Type: application/json');
		echo json_encode( $visuales  , JSON_UNESCAPED_UNICODE);
		return;
	}


	function guardar_configuracion(){
		$data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();

		$cantidad = $this->input->post('cant_obras');
		$orden = $this->input->post('orden_obras');

		$update_conf = $this->obras_model->guardar_configuracion($cantidad, $orden);
		redirect("admin/home");
	}



	function modificacion_idioma(){
		$id_obra = $this->input->post('id');
		$titulo = reg_expresion($this->input->post('titulo'));
		$descripcion = reg_expresion($this->input->post('descripcion'));
		$tipologia = reg_expresion($this->input->post('tipologia'));
		$proyecto = reg_expresion($this->input->post('proyecto'));
		$ubicacion = reg_expresion($this->input->post('ubicacion'));

		$editado = $this->obras_model->modificacion_idioma($id_obra, $titulo, $descripcion, $proyecto, $ubicacion, $tipologia);

		if($editado == 1):
			establecer_mensaje_emergente("Obra modificada", "success");
		else:
			establecer_mensaje_emergente("La obra no pudo modificarse", "error");
		endif;
		redirect("admin/obras");


	}



	function modificacion_imagenes_obra(){
		
		$id_obra = $this->input->post('mei_id');
		$imagenes = $_FILES['mei_imagenes'];
		$destacada = $_POST['eo_foto_destacada'];

		if(isset($_POST['eo_borrar_foto'])):
			$a_borrar = $_POST['eo_borrar_foto'];
			$imagenes_a_borrar = $_POST['eo_foto_actual'];

			foreach($imagenes_a_borrar as $k => $v):
				if($a_borrar[$k] == 1):
					unlink($v);
					$this->visuales_model->borrar_foto($id_obra, $v);
				endif;
			endforeach;
		endif;

		$count_imagenes = count($_FILES['mei_imagenes']['size']);
		$errores = 0;	
		if($count_imagenes > 0):
			for ($i=0; $i<$count_imagenes; $i++) :
				if(!empty($_FILES['mei_imagenes']['name'][$i])):
					
					if (!file_exists('_res/visuales/obras')) {
						mkdir('_res/visuales/obras/', 0777, true);
					}
					if (!file_exists('_res/visuales/obras/'.$id_obra)) {
						mkdir("_res/visuales/obras/".$id_obra, 0777);
					}
					$milliseconds = round(microtime(true) * 1000);
					$upload_path = "_res/visuales/obras/".$id_obra;
					$nombre_imagen = "obra_".$id_obra.$milliseconds."_".$i;

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

						$insert_visual = $this->visuales_model->alta_visual($id_obra, $imagen_subida, 0, 1);
						if($insert_visual == 0):
							establecer_mensaje_emergente("Ocurri� un error al intentar cargar la imagen.", "error");
							$errores++;
						endif;
					else:
						$imageError =  $this->upload->display_errors();
						establecer_mensaje_emergente("Ocurri� un error al intentar cargar la imagen. Error: ".$imageError, "error");
						redirect("admin/obras");
					endif;
				endif;
			
			endfor;

			$this->visuales_model->unset_destacada($id_obra);
			$this->visuales_model->set_destacada($id_obra,$destacada);

			establecer_mensaje_emergente("Imagenes editadas", "success");
			redirect("admin/obras");
		endif;
	}

	function modificacion_videos_obra(){
		$id_obra = $this->input->post('mev_id');
		$imagenes = $_FILES['mev_videos'];

		if(isset($_POST['eo_borrar_video'])):
			$a_borrar = $_POST['eo_borrar_video'];
			$videos_a_borrar = $_POST['eo_video_actual'];

			foreach($videos_a_borrar as $k => $v):
				if($a_borrar[$k] == 1):
					unlink($v);
					$this->visuales_model->borrar_foto($id_obra, $v);
				endif;
			endforeach;
		endif;

		$count_videos = count($_FILES['mev_videos']['size']);
		$errores = 0;	
		if($count_videos > 0):
			for ($i=0; $i<$count_videos; $i++) :
				if(!empty($_FILES['mev_videos']['name'][$i])):
					
					if (!file_exists('_res/visuales/obras')) {
						mkdir('_res/visuales/obras/', 0777, true);
					}
					if (!file_exists('_res/visuales/obras/'.$id_obra)) {
						mkdir("_res/visuales/obras/".$id_obra, 0777);
					}
					$milliseconds = round(microtime(true) * 1000);
					$upload_path = "_res/visuales/obras/".$id_obra;
					$nombre_imagen = "obra_".$id_obra.$milliseconds."_".$i;

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

						$insert_visual = $this->visuales_model->alta_visual($id_obra, $imagen_subida, 0, 3);
						if($insert_visual == 0):
							establecer_mensaje_emergente("Ocurri� un error al intentar cargar el video.", "error");
							$errores++;
						endif;
					else:
						$imageError =  $this->upload->display_errors();
						establecer_mensaje_emergente("Ocurri� un error al intentar cargar elvideo. Error: ".$imageError, "error");
						redirect("admin/obras");
					endif;
				endif;
			
			endfor;


			establecer_mensaje_emergente("Imagenes editadas", "success");
			redirect("admin/obras");
		endif;
	}



	public function modificacionObra(){
		$logged_user = $this->session->all_userdata();

		$id = $this->input->post("me_id");
		$titulo = reg_expresion($this->input->post("me_titulo"));
		$descripcion = reg_expresion($this->input->post('me_descripcion'));
		$anio_proyecto = reg_expresion($this->input->post('me_anio_proyecto'));
		$area = reg_expresion($this->input->post('me_area'));
		$proyecto = reg_expresion($this->input->post('me_proyecto'));
		$ejecucion = reg_expresion($this->input->post('me_ejecucion'));
		$construccion_direccion = reg_expresion($this->input->post('me_construccion_direccion'));
		$disenio_dim_estruc = reg_expresion($this->input->post('me_disenio_dim_estruc'));
		$tipologia = reg_expresion($this->input->post('me_tipologia'));
		$disenio_dim_clim = reg_expresion($this->input->post('me_disenio_dim_clim'));
		$ubicacion = reg_expresion($this->input->post('me_ubicacion'));
		$estado = reg_expresion($this->input->post('me_estado'));

		$direccion_tecnica = reg_expresion($this->input->post('me_direccion_tecnica'));
		$asist_tec_obra = reg_expresion($this->input->post('me_asist_tec_obra'));
		$estructuras = reg_expresion($this->input->post('me_estructuras'));
		$instalaciones = reg_expresion($this->input->post('me_instalaciones'));
		$gestion_documentacion = reg_expresion($this->input->post('me_gestion_documentacion'));
		$sup_terreno = reg_expresion($this->input->post('me_sup_terreno'));
		$sup_cubierta = reg_expresion($this->input->post('me_sup_cubierta'));
		$anio_finalizacion = reg_expresion($this->input->post('me_anio_finalizacion'));
		$fotografia = reg_expresion($this->input->post('me_fotografia'));

		$usuario_modif = $logged_user['logged_user_id'];
		$fecha_modif = date("Y-m-d H:i:s");

		$editado = $this->obras_model->modificacionObra($id, $titulo, $descripcion, $anio_proyecto, $proyecto, $ejecucion, $construccion_direccion, $disenio_dim_estruc, $tipologia, $disenio_dim_clim, $area, $ubicacion, $usuario_modif, $fecha_modif, $estado, $direccion_tecnica, $asist_tec_obra,$estructuras, $instalaciones,$gestion_documentacion, $sup_terreno,$sup_cubierta, $anio_finalizacion, $fotografia);
	
		if($editado == 1):
			establecer_mensaje_emergente("Obra modificada", "success");
		else:
			establecer_mensaje_emergente("La obra no pudo modificarse", "error");
		endif;
		redirect("admin/obras");

	} //modificacionObra


	function modificacion_traduccion(){
		$id = $this->input->post('id');
		$titulo = $this->input->post('titulo');
		$descripcion = $this->input->post('descripcion');
		$proyecto = $this->input->post('proyecto');
		$ubicacion = $this->input->post('ubicacion');
		$tipologia = $this->input->post('tipologia');

		$editado = $this->obras_model->modificacion_traduccion($id, $titulo, $descripcion, $proyecto, $ubicacion, $tipologia);

		if($editado == 1):
			establecer_mensaje_emergente("Traducción modificada", "success");
		else:
			establecer_mensaje_emergente("La Traducción no pudo modificarse", "error");
		endif;
		redirect("admin/obras");
	}


	function obtener_traduccion(){
		$id = $this->input->post('id');
		$traduccion = $this->obras_model->obtener_traduccion($id);

		header('Content-Type: application/json');
		echo json_encode( $traduccion  , JSON_UNESCAPED_UNICODE);
		return;
	}

	public function ver_obras(){
		$data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
		
		$obras = $this->obras_model->obtener_obras();
		$data['mensaje_emergente'] = obtener_mensaje_emergente();

		//se fija si la obra tiene imagen destacada
		foreach($obras as $k =>$v):
			$tiene_destacada = $this->visuales_model->tiene_destacada($v['id']);
			$obras[$k]['tiene_destacada'] = $tiene_destacada[0]['tiene'];
		endforeach;
		
		$data['obras'] = $obras;

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/obras',$data);
		$this->load->view('layout/footer_admin',$data);
		$this->load->view('admin/js/obras.php');
	}

 

}