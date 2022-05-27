<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //agregado para 000webhost
class Visuales_mosaico_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}


    public function alta_visual($id_mosaico, $path, $es_destacada, $orden){
        
		$sql = "
        INSERT INTO visuales_mosaico(
            id_mosaico,
            path,
            es_destacada,
            orden
        )VALUES (
            $id_mosaico,
            '$path',
            '$es_destacada',
            '$orden')";

        $query = $this->db->query($sql);
        $insert = $this->db->affected_rows();

        return ($insert == 1) ? 1 : 0;
	}


    function borrar_foto($id_mosaico, $imagen){
        $sql = "DELETE FROM visuales_mosaico WHERE id_mosaico = $id_mosaico AND path = '$imagen'";
		$query = $this->db->query($sql);
    }


    function get_visuales_by_id_producto($id){
        $sql = "SELECT * FROM visuales_mosaico WHERE id_mosaico = $id" ;
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function set_destacada($id_mosaico,$destacada){
		$sql = "
		UPDATE visuales_mosaico 
		SET es_destacada = 1
		WHERE id_mosaico = $id_mosaico 
		AND path = '$destacada' ";
		$res  = $this->db->query($sql);
	}

    function set_orden($id_foto,$orden){
		$sql = "
		UPDATE visuales_mosaico 
		SET orden = $orden
		WHERE id = $id_foto ";
		$res  = $this->db->query($sql);
	}

    function unset_destacada($id_mosaico){
		$sql = "
		UPDATE visuales_mosaico 
		SET es_destacada = 0
		WHERE id_mosaico = $id_mosaico ";
		$res  = $this->db->query($sql);
	}

}