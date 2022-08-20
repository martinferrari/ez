<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //agregado para 000webhost
class Post_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();
		$this->load->helper('date_helper');

	}


	public function obtener_novedad($id, $estado, $idioma){
		if($idioma == "es"):
			$sql = "SELECT 
					p.id,
					p.tipo,
					p.titulo,
					p.descripcion
				FROM post p
				WHERE p.estado = $estado 
				and p.id = $id";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;

		if($idioma == "en"):
			$sql = "SELECT 
				p.id,
				p.tipo,
				p.titulo,
				p.descripcion,
				t.titulo AS trad_titulo,
				t.descripcion AS trad_descripcion
			FROM post p
			LEFT JOIN post_traducciones t ON t.id_post = p.id
			WHERE p.estado = $estado 
			AND p.id = $id";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;
	}

	public function obtener_novedades($cantidad, $orden, $idioma){
		if($idioma == "es"):
			$sql = "SELECT 
					p.id,
					p.tipo,
					p.titulo,
					v.path,
					vc.path as cuadrada
				FROM post p
				LEFT JOIN visuales v on v.id_post = p.id
				LEFT JOIN visuales vc ON vc.id_post = p.id
				WHERE p.estado = 1 
				and p.tipo = 3
				AND v.es_destacada = 1
				AND vc.es_destacada_cuadrada = 1
				ORDER BY $orden
				LIMIT $cantidad ";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;

		if($idioma == "en"):
			$sql = "SELECT 
				p.id,
				p.tipo,
				p.titulo,
				v.path,
				vc.path as cuadrada,
				t.titulo AS trad_titulo
			FROM post p
			JOIN visuales v on v.id_post = p.id
			LEFT JOIN visuales vc ON vc.id_post = p.id
			LEFT JOIN post_traducciones t ON t.id_post = p.id
			WHERE p.estado = 1 
			and p.tipo = 3
			AND v.es_destacada = 1
			AND vc.es_destacada_cuadrada = 1
			ORDER BY $orden
			LIMIT $cantidad ";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;

	}


	public function obtener_obra($id, $estado, $idioma){
		if($idioma == "es"):
			$sql = "SELECT 
					* 
				FROM post p
				WHERE p.estado = $estado 
				and p.id = $id
				ORDER BY p.fecha_alta DESC";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;

		if($idioma == "en"):
			$sql = "SELECT 
					p.*,
					t.titulo as trad_titulo,
					t.descripcion as trad_descripcion,
					t.proyecto as trad_proyecto,
					t.ubicacion as trad_ubicacion,
					t.tipologia as trad_tipologia
				FROM post p
				LEFT JOIN post_traducciones t on t.id_post = p.id
				WHERE p.estado = $estado 
				and p.id = $id
				ORDER BY p.fecha_alta DESC";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;
	}



	public function obtener_obras($cantidad, $orden, $idioma, $tipo){
		if($idioma == "es"):
			$sql = "SELECT 
				p.id,
				p.tipo,
				p.titulo,
				v.path,
				vc.path as cuadrada,
				null AS trad_titulo
			FROM post p
			LEFT JOIN visuales v on v.id_post = p.id
			LEFT JOIN visuales vc ON vc.id_post = p.id
			WHERE p.estado = 1 
			AND p.tipo = $tipo
			AND v.es_destacada = 1
			AND vc.es_destacada_cuadrada = 1
			ORDER BY $orden
			LIMIT $cantidad ";

			$res = $this->db->query($sql);
			return $res->result_array();
		endif;

		if($idioma == "en"):
			$sql = "SELECT 
				p.id,
				p.tipo,
				p.titulo,
				v.path,
				vc.path as cuadrada,
				t.titulo AS trad_titulo
			FROM post p
			JOIN visuales v on v.id_post = p.id
			LEFT JOIN post_traducciones t ON t.id_post = p.id
			LEFT JOIN visuales vc ON vc.id_post = p.id
			WHERE p.estado = 1 
			and p.tipo = $tipo
			AND v.es_destacada = 1
			AND vc.es_destacada_cuadrada = 1
			ORDER BY $orden
			LIMIT $cantidad ";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;
	}


	public function obtener_post_home($orden, $idioma, $limit){
		
		if($idioma == "es"):
			$sql = "SELECT 
					p.id,
					p.tipo,
					p.titulo,
					v.path,
					vc.path as cuadrada 
				FROM post p
				LEFT JOIN visuales v on v.id_post = p.id
				LEFT JOIN visuales vc ON vc.id_post = p.id
				WHERE p.estado = 1 
				AND v.es_destacada = 1
				AND vc.es_destacada_cuadrada = 1
				AND p.tipo IN (1,2,4) /*no mostrar novedades*/
				ORDER BY $orden
				LIMIT $limit ";
		endif;

		if($idioma == "en"):
			$sql = "SELECT 
				p.id,
				p.tipo,
				p.titulo,
				v.path,
				vc.path as cuadrada,
				t.titulo AS trad_titulo
			FROM post p
			LEFT JOIN visuales v on v.id_post = p.id
			LEFT JOIN visuales vc ON vc.id_post = p.id
			LEFT JOIN post_traducciones t ON t.id_post = p.id
			WHERE p.estado = 1 
			AND v.es_destacada = 1
			AND vc.es_destacada_cuadrada = 1
			AND p.tipo IN (1,2,4) /*no mostrar novedades*/
			ORDER BY $orden
			LIMIT $limit ";
		endif;

		$res = $this->db->query($sql);
		return $res->result_array();
	}



	public function obtener_proyectos($cantidad, $orden, $idioma){
		if($idioma == "es"):
			$sql = "SELECT 
					p.id,
					p.tipo,
					p.titulo,
					v.path,
					vc.path as cuadrada 
				FROM post p
				LEFT JOIN visuales v on v.id_post = p.id
				LEFT JOIN visuales vc ON vc.id_post = p.id
				WHERE p.estado = 1 
				and p.tipo = 2
				AND v.es_destacada = 1
				AND vc.es_destacada_cuadrada = 1
				ORDER BY $orden
				LIMIT $cantidad ";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;

		if($idioma == "en"):
			$sql = "SELECT 
				p.id,
				p.tipo,
				p.titulo,
				v.path,
				vc.path as cuadrada,
				t.titulo AS trad_titulo
			FROM post p
			LEFT JOIN visuales v on v.id_post = p.id
			LEFT JOIN visuales vc ON vc.id_post = p.id
			LEFT JOIN post_traducciones t ON t.id_post = p.id
			WHERE p.estado = 1 
			and p.tipo = 2
			AND v.es_destacada = 1
			AND vc.es_destacada_cuadrada = 1
			ORDER BY $orden
			LIMIT $cantidad ";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;
	}

	public function obtener_proyecto($id, $estado, $idioma){
		if($idioma == "es"):
			$sql = "SELECT 
					* 
				FROM post p
				WHERE p.estado = $estado
				and p.id = $id
				ORDER BY p.fecha_alta DESC";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;

		if($idioma == "en"):
			$sql = "SELECT 
					p.*,
					t.titulo as trad_titulo,
					t.descripcion as trad_descripcion,
					t.proyecto as trad_proyecto,
					t.ubicacion as trad_ubicacion,
					t.tipologia as trad_tipologia
				FROM post p
				LEFT JOIN post_traducciones t on t.id_post = p.id
				WHERE p.estado = $estado 
				and p.id = $id
				ORDER BY p.fecha_alta DESC";
			$res = $this->db->query($sql);
			return $res->result_array();
		endif;
	}


	public function obtener_visuales($id_post){
		$sql = "SELECT 
				*
			FROM visuales v 
			WHERE v.id_post = $id_post
			ORDER BY orden";
		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function obtener_visuales_nosotros($id_nosotros){
		$sql = "SELECT 
				id, path
			FROM nosotros_visuales v 
			WHERE v.id_post = $id_nosotros";
		$res = $this->db->query($sql);
		return $res->result_array();
	}


}//eof