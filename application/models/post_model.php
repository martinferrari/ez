<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //agregado para 000webhost
class Post_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();
		$this->load->helper('date_helper');

	}

	public function obtener_obra($id){
		$sql = "SELECT 
				* 
			FROM post p
			WHERE p.estado = 1 
			and p.id = $id
			ORDER BY p.fecha_alta DESC";
		$res = $this->db->query($sql);
		return $res->result_array();
	}



	public function obtener_obras($cantidad){
		$sql = "SELECT 
				p.id,
				p.tipo,
				p.titulo,
				v.path 
			FROM post p
			JOIN visuales v on v.id_post = p.id
			WHERE p.estado = 1 
			and p.tipo = 1
			AND v.es_destacada = 1
			ORDER BY p.fecha_alta DESC
			LIMIT $cantidad ";
		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function obtener_post_home($cantidad){
		$sql = "
			SELECT 
				p.id,
				p.tipo,
				p.titulo,
				v.path 
			FROM post p
			JOIN visuales v on v.id_post = p.id
			WHERE p.estado = 1 
			AND v.es_destacada = 1
			ORDER BY p.fecha_alta DESC
			LIMIT $cantidad
		";
		$res = $this->db->query($sql);
		return $res->result_array();
	}



	public function obtener_proyectos($cantidad){
		$sql = "SELECT 
				p.id,
				p.tipo,
				p.titulo,
				v.path 
			FROM post p
			JOIN visuales v on v.id_post = p.id
			WHERE p.estado = 1 
			and p.tipo = 2
			AND v.es_destacada = 1
			ORDER BY p.fecha_alta DESC
			LIMIT $cantidad ";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function obtener_visuales($id_post){
		$sql = "SELECT 
				*
			FROM visuales v 
			WHERE v.id_post = $id_post";
		$res = $this->db->query($sql);
		return $res->result_array();
	}



}//eof