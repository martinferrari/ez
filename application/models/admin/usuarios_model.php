<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //agregado para 000webhost
class Usuarios_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}

	public function validar_login($nombre, $pass){
        
		$sql = "SELECT *
			FROM usuario u
			WHERE u.estado = 1 
			and u.nombre = '$nombre'
			and u.password = '$pass'";
		$res = $this->db->query($sql);
		return $res->result_array();
	}



}//eof