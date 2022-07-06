<?php ob_start(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nosotros extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/nosotros_model');
		$this->load->model('admin/visuales_model');
	}


	function altaNosotros(){
		$logged_user = $this->session->all_userdata();

		$nombre = reg_expresion($this->input->post('nombre'));
		$apellido = reg_expresion($this->input->post('apellido'));
		$cargo = reg_expresion($this->input->post('cargo'));
		$estado = $this->input->post('estado');

		$insert = $this->nosotros_model->alta_nosotros($nombre, $apellido, $cargo, $estado);

		if($insert != 0):
			$id_nosotros = $insert;
		else:
			establecer_mensaje_emergente("Se produjo un error", "error");
			redirect("admin/nosotros");
		endif;

		if (!file_exists('_res/visuales/nosotros')) {
			mkdir('_res/visuales/nosotros/', 0777, true);
		}
		mkdir("_res/visuales/nosotros/".$id_nosotros, 0777);

		$errores = 0;

		//imagenes
		$imagenes = $_FILES['imagenes'];
		$count_imagenes = count($_FILES['imagenes']['name']);
		for ($i=0; $i<$count_imagenes; $i++) {
			if(!empty($_FILES['imagenes']['name'][$i])):

				$upload_path = "_res/visuales/nosotros/".$id_nosotros;

				$nombre_imagen = "nosotros_".$id_nosotros."_".$i;

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
					
					$insert_visual = $this->visuales_model->alta_visual_nosotros($id_nosotros, $imagen_subida);
					if($insert_visual == 0):
						establecer_mensaje_emergente("Se produjo un error al intentar cargar la imagen.", "error");
						$errores++;
					endif;
				else:
					$imageError =  $this->upload->display_errors();
					establecer_mensaje_emergente("Se produjo un error al intentar cargar la imagen. Error: ".$imageError, "error");
					redirect("admin/nosotros");
				endif;				
			endif;	
		}

		if($errores > 0):
			$this->borrar_nosotros($id_nosotros);
		endif;


		if($errores == 0):
			establecer_mensaje_emergente("Persona agregada", "success");
		endif;
		redirect("admin/nosotros");
	}

	function borrar_nosotros($id_nosotros = null){
		$id = ($id_nosotros != null) ? $id_nosotros : $this->uri->segment(3);
		
		$baja = $this->nosotros_model->baja_nosotros($id);

		if($baja == 1):
			establecer_mensaje_emergente("Registro eliminado", "success");
			$dir = "_res/visuales/nosotros/".$id;
			rmdir_recursive($dir); //en helper
		else:
			establecer_mensaje_emergente("El registro no pudo eliminarse", "error");
		endif;
		
		redirect("admin/nosotros");
	}


	function get_visuales_by_id_nosotros($id_nosotros = null,$tipo = null){
		$id_nosotros = ($id_nosotros == null) ? $this->input->post('id_nosotros') : $id_nosotros;
		$visuales = $this->visuales_model->get_nosotros_visuales_by_id_post($id_nosotros);
	
		header('Content-Type: application/json');
		echo json_encode( $visuales  , JSON_UNESCAPED_UNICODE);
		return;
	
	}


	function modificacion_imagen_nosotros(){
		
		$id_nosotros = $this->input->post('mei_id');
		$imagenes = $_FILES['mei_imagenes'];

		if(isset($_POST['eo_borrar_foto'])):
			$a_borrar = $_POST['eo_borrar_foto'];
			$imagenes_a_borrar = $_POST['eo_foto_actual'];

			foreach($imagenes_a_borrar as $k => $v):
				if($a_borrar[$k] == 1):
					unlink($v);
					$this->visuales_model->borrar_foto_nosotros($id_nosotros, $v);
				endif;
			endforeach;
		endif;

		$count_imagenes = count($_FILES['mei_imagenes']['size']);
		$errores = 0;	
		if($count_imagenes > 0):
			for ($i=0; $i<$count_imagenes; $i++) :
				if(!empty($_FILES['mei_imagenes']['name'][$i])):
					
					if (!file_exists('_res/visuales/nosotros')) {
						mkdir('_res/visuales/nosotros/', 0777, true);
					}
					if (!file_exists('_res/visuales/nosotros/'.$id_nosotros)) {
						mkdir("_res/visuales/nosotros/".$id_nosotros, 0777);
					}
					$milliseconds = round(microtime(true) * 1000);
					$upload_path = "_res/visuales/nosotros/".$id_nosotros;
					$nombre_imagen = "nosotros_".$id_nosotros.$milliseconds."_".$i;

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

						$insert_visual = $this->visuales_model->alta_visual_nosotros($id_nosotros, $imagen_subida);
						if($insert_visual == 0):
							establecer_mensaje_emergente("Se produjo un error al intentar cargar la imagen.", "error");
							$errores++;
						endif;
					else:
						$imageError =  $this->upload->display_errors();
						establecer_mensaje_emergente("Se produjo un error al intentar cargar la imagen. Error: ".$imageError, "error");
						redirect("admin/nosotros");
					endif;
				endif;
			
			endfor;
			establecer_mensaje_emergente("Imagen editada", "success");
			redirect("admin/nosotros");
		endif;
	}

	



	function modificacion_nosotros(){
		$logged_user = $this->session->all_userdata();

		$id = $this->input->post("en_id");
		$nombre = reg_expresion($this->input->post("en_nombre"));
		$apellido = reg_expresion($this->input->post("en_apellido"));
		$cargo = reg_expresion($this->input->post("en_cargo"));
		$estado = $this->input->post("en_estado");
        $foto = $this->input->post("en_foto");

		$usuario_modif = $logged_user['logged_user_id'];
		$fecha_modif = date("Y-m-d H:i:s");

		$editado = $this->nosotros_model->modificacionNosotros($id, $nombre, $apellido, $cargo, $estado, $foto);

		if($editado == 1):
			establecer_mensaje_emergente("Registro modificado", "success");
		else:
			establecer_mensaje_emergente("El registro no pudo modificarse", "error");
		endif;
		redirect("admin/nosotros");

	}


	function modificacion_traduccion(){
		$id = $this->input->post('id');
		$cargo = $this->input->post('cargo');

		$editado = $this->nosotros_model->modificacion_traduccion($id, $cargo);

		if($editado == 1):
			establecer_mensaje_emergente("Traducción modificada", "success");
		else:
			establecer_mensaje_emergente("La Traducción no pudo modificarse", "error");
		endif;
		redirect("admin/nosotros");
	}


	public function ver_nosotros(){
		$data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
		$data['mensaje_emergente'] = obtener_mensaje_emergente();
		$nosotros = $this->nosotros_model->obtener_nosotros();

		foreach($nosotros as $k =>$v):
			$tiene_foto = $this->visuales_model->tiene_destacada($v['id']);
			$nosotros[$k]['tiene_foto'] = $tiene_foto[0]['tiene'];
		endforeach;
		
		
		$data['nosotros'] = $nosotros;

		$this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/nosotros',$data);
		$this->load->view('layout/footer_admin');
		$this->load->view('admin/js/nosotros',$data);
	}
	
}