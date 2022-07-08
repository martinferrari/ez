<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Novedades_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}

	public function alta_novedad($titulo, $descripcion, $usuario_alta, $fecha_alta, $categoria, $estado, $prioridad){
	
		$sql = "INSERT INTO `post`
		(`tipo`,
		 `titulo`,
		 `descripcion`,
		 `usuario_alta`,
		 `fecha_alta`,
		 `categoria`,
		 `estado`,
		 `prioridad`
		 )
		VALUES ('3',
			'$titulo',
			'$descripcion',
			'$usuario_alta',
			'$fecha_alta',
			'$categoria',
			'$estado',
			'$prioridad'
			)";

		$query = $this->db->query($sql);
		$insert = $this->db->affected_rows();

		return ($insert == 1) ? $this->db->insert_id() : 0;
	}


	function alta_traduccion($id, $titulo = null, $descripcion = null){
		$sql = "INSERT INTO post_traducciones
				(id_post,
				titulo,
				descripcion)
			VALUES (
				$id,
				'$titulo',
				'$descripcion')";
		$query = $this->db->query($sql);
		$insert = $this->db->affected_rows();
		return ($insert == 1) ? $this->db->insert_id() : 0;
	}



	function baja_novedad($id){
		$sql = "DELETE FROM post WHERE id = $id";
		$query = $this->db->query($sql);
		$baja = $this->db->affected_rows();
		return ($baja == 1) ? 1 : 0;
	}

	function get_configuracion(){
		$sql = "SELECT valor FROM configuracion WHERE campo = 'novedades en pagina'";
		$query1 = $this->db->query($sql);
		$cantidad = $query1->result_array();

		$sql = "SELECT valor FROM configuracion WHERE campo = 'orden novedades'";
		$query2 = $this->db->query($sql);
		$orden = $query2->result_array();

		$conf['cantidad'] = $cantidad[0];
		$conf['orden'] = $orden[0];
		return $conf;
	}

	function guardar_configuracion($cantidad, $orden){
		$sql = "UPDATE configuracion SET valor = '$cantidad' WHERE campo = 'novedades en pagina' ";
		$query = $this->db->query($sql);

		$sql = "UPDATE configuracion SET valor = '$orden' WHERE campo = 'orden novedades' ";
		$query = $this->db->query($sql);
	}
	

	public function modificacionNovedad($id, $titulo, $descripcion, $categoria, $estado, $usuario_modif, $fecha_modif, $prioridad){
		$sql = "UPDATE post  SET
		`titulo` = '$titulo',
		`descripcion` = '$descripcion',
		`categoria` = '$categoria',
		`usuario_modificacion` = '$usuario_modif',
		`fecha_modificacion` = '$fecha_modif',
		`estado` = $estado,
		`prioridad` = '$prioridad'
		WHERE `id` = $id";
		echo $sql;
		$query = $this->db->query($sql);
		$update = $this->db->affected_rows();
		
		return ($update != 1) ? 0 : 1;
	}


	function modificacion_traduccion($id, $titulo = null, $descripcion = null, $proyecto = null, $ubicacion = null, $tipologia = null){

		$sql = "SELECT * FROM post_traducciones WHERE id_post = $id";
		$query = $this->db->query($sql);
		$existe = $query->result();
		
		if(!empty($existe)):
			$sql = "UPDATE post_traducciones
			SET 
			titulo = '$titulo',
			descripcion = '$descripcion'
			WHERE id_post = $id";
			$query = $this->db->query($sql);
			$update = $this->db->affected_rows();
			return ($update != 1) ? 0 : 1;
		else:
			$sql = "INSERT INTO post_traducciones
				(id_post,
				titulo,
				descripcion)
			VALUES (
				$id,
				'$titulo',
				'$descripcion')";
			$query = $this->db->query($sql);
			$insert = $this->db->affected_rows();
			return ($insert == 1) ? 1 : 0;
		endif;
	}



	public function obtener_cantidad_publicados(){
		$sql = "SELECT 
				count(*) as cantidad
			FROM post
			WHERE estado = 1
			AND tipo = 3";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	function obtener_categorias(){
		$sql = "SELECT * FROM categorias";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function obtener_novedades($cantidad = null){
        $cantidad = ($cantidad == null) ? 9999999 : $cantidad;

		$sql = "SELECT 
				id,
				tipo,
				titulo,
				descripcion,
				anio_proyecto,
				proyecto,
				ejecucion,
				construccion_direccion,
				disenio_dim_estruc,
				tipologia,
				disenio_dim_clim,
				area,
				ubicacion,
				categoria,
				usuario_alta,
				fecha_alta,
				usuario_modificacion,
				fecha_modificacion,
				estado,
				direccion_tecnica,
				asist_tec_obra,
				estructuras,
				instalaciones,
				gestion_documentacion,
				sup_terreno,
				sup_cubierta,
				anio_finalizacion,
				fotografia
			FROM post p
			WHERE p.tipo = 3
			ORDER BY p.fecha_alta DESC
			LIMIT $cantidad ";
		$res = $this->db->query($sql);
		return $res->result_array();
	}


	function obtener_traduccion($id){
		$sql = "SELECT * FROM post_traducciones WHERE id_post = $id";
		$res = $this->db->query($sql);
		return $res->result();
	}



}//eof