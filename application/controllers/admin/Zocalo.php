<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zocalo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('admin/obras_model');
		// $this->load->model('admin/visuales_model');
	}


    /* Modifica la imagen del zocalo de una seccion. La imagen del zocalo es la que esta en el fondo del titulo de la web de cada seccion */
    function modificacion(){
        $seccion = strtolower($this->input->post("mz_seccion"));

        $seccion = (strpos($seccion, "ejec") > 0) ? "obras_ejecucion" : $seccion;

        if (!file_exists('_res/zocalos/')) {
			mkdir('_res/zocalos/', 0777, true);
		}
        unlink('_res/zocalos/'.$seccion.".jpg");

        $imagenes = $_FILES['mz_imagen'];
        
        if(!empty($_FILES['mz_imagen']['name'])):

            $upload_path = "_res/zocalos/";
            $nombre_imagen = $seccion;

            $_FILES['imagen']['name'] = $imagenes['name'];
            $_FILES['imagen']['type'] = $imagenes['type'];
            $_FILES['imagen']['tmp_name'] = $imagenes['tmp_name'];
            $_FILES['imagen']['error'] = $imagenes['error'];
            $_FILES['imagen']['size'] = $imagenes['size'];
        
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg';
            $config['max_size'] = '0';
            
            $config['file_name'] = $nombre_imagen;

            $this->load->library('upload',$config); 
            if($this->upload->do_upload('imagen')):
                $uploadData = $this->upload->data();
                $imagen_subida = $upload_path."/".$uploadData['file_name'];
                establecer_mensaje_emergente("Imagen cargada correctamente", "success");
            else:
                $imageError =  $this->upload->display_errors();
                establecer_mensaje_emergente("Ocurri� un error al intentar cargar la imagen. Error: ".$imageError, "error");
                redirect($this->agent->referrer());
            endif;				
        endif;	

        redirect($this->agent->referrer());
        
    }



    function ver_zocalos(){
        $data['logged_user'] = $this->session->all_userdata();
		$this->sesiones->valida_sesion();
        $data['mensaje_emergente'] = obtener_mensaje_emergente();

        $this->load->view('layout/head_admin');
		$this->load->view('layout/sidebar_admin',$data);
		$this->load->view('admin/zocalos',$data);
		$this->load->view('layout/footer_admin',$data);
		$this->load->view('admin/js/zocalos.php');
    }

} //EOF