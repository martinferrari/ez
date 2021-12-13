<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //agregado para 000webhost
class Usuarios_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}

	function alta_usuario($nombre, $pass, $tipo, $estado){
		$sql = "INSERT INTO usuario
		(nombre,
		 password,
		 estado,
		 tipo)
		VALUES ('$nombre',
			'$pass',
			'$estado',
			'$tipo')";
		
		$query = $this->db->query($sql);
		$insert = $this->db->affected_rows();

		return ($insert == 1) ? $this->db->insert_id() : 0;
	}

	function modificacion_password($id, $pass){
		$sql = "UPDATE usuario
		SET password = '$pass'
		WHERE id = $id";
		
		$query = $this->db->query($sql);
		$update = $this->db->affected_rows();

		return $update;
	}

	function modificacion_usuario($id, $nombre, $pass, $tipo, $estado){
		$sql = "UPDATE usuario
		SET nombre = '$nombre',
		  password = '$pass',
		  estado = $estado,
		  tipo = $tipo
		WHERE id = $id";
		
		$query = $this->db->query($sql);
		$update = $this->db->affected_rows();

		return $update;
	}

	function obtener_usuarios(){
		$sql = "SELECT * FROM usuario";
		$res = $this->db->query($sql);
		return $res->result_array();
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