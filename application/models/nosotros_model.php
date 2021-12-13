<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Nosotros_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}

    public function obtener_nosotros($cantidad = null, $estado = null){
            $cantidad = ($cantidad == null) ? 9999999 : $cantidad;
            $where_estado = ($estado == null) ? "" : " AND estado = $estado ";

            $sql = "SELECT 
                    id,
                    nombre,
                    apellido,
                    cargo,
                    foto,
                    foto2,
                    foto3,
                    estado
                FROM nosotros
                WHERE 1=1
                $where_estado
                ORDER BY nombre DESC
                LIMIT $cantidad ";
            $res = $this->db->query($sql);
            return $res->result_array();
        }

}//eof