<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //agregado para 000webhost
class Visuales_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}

	public function alta_visual($id_post, $path, $es_destacada, $tipo, $orden){
        
		$sql = "
        INSERT INTO `visuales`
            (`id_post`,
             `path`,
             `es_destacada`,
             `tipo`,
			 `orden`)
        VALUES ('$id_post',
                '$path',
                '$es_destacada',
                '$tipo',
				$orden)";

        $query = $this->db->query($sql);
        $insert = $this->db->affected_rows();

        return ($insert == 1) ? 1 : 0;
	}

	public function alta_visual_nosotros($id_post, $path){
        
		$sql = "
        INSERT INTO `nosotros_visuales`
            (`id_post`,
             `path`)
        VALUES ('$id_post',
                '$path')";

        $query = $this->db->query($sql);
        $insert = $this->db->affected_rows();

        return ($insert == 1) ? 1 : 0;
	}

    function borrar_foto($id_post, $imagen){
		$sql = "DELETE FROM visuales WHERE id_post = $id_post AND path = '$imagen'";
		$query = $this->db->query($sql);
	}

	function borrar_foto_nosotros($id_post, $imagen){
		$sql = "DELETE FROM nosotros_visuales WHERE id_post = $id_post AND path = '$imagen'";
		$query = $this->db->query($sql);
	}


	function get_visuales_by_id_post($id_post, $tipo){
		$sql = "SELECT
		id,
		id_post,
		path,
		es_destacada,
		tipo,
		orden
	  FROM visuales
	  WHERE id_post = $id_post
	  AND tipo = $tipo
	  ORDER BY orden ";
	  $query = $this->db->query($sql);
	  return $query->result_array();

	} //get_imagenes_by_id_post

	function get_nosotros_visuales_by_id_post($id_post){
		$sql = "SELECT
		id,
		id_post,
		path
	  FROM nosotros_visuales
	  WHERE id_post = $id_post
";
	  $query = $this->db->query($sql);
	  return $query->result_array();

	} //get_imagenes_by_id_post



	function set_destacada($id_post,$destacada){
		$sql = "
		UPDATE visuales 
		SET es_destacada = 1
		WHERE id_post = $id_post 
		AND path = '$destacada' ";
		$res  = $this->db->query($sql);
	}

	function set_orden($id_foto,$orden){
		$sql = "
		UPDATE visuales 
		SET orden = $orden
		WHERE id = $id_foto ";
		$res  = $this->db->query($sql);
	}

	function tiene_destacada($id_post){
		$sql = "SELECT COUNT(1) as tiene FROM visuales WHERE id_post = $id_post AND es_destacada = 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function unset_destacada($id_post){
		$sql = "
		UPDATE visuales 
		SET es_destacada = 0
		WHERE id_post = $id_post ";
		$res  = $this->db->query($sql);
	}


}//eof