<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //agregado para 000webhost
class Proyectos_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}


	public function alta_proyecto($titulo, $descripcion, $anio_proyecto, $proyecto, $ejecucion, $construccion_direccion, $disenio_dim_estruc, $tipologia, $disenio_dim_clim, $area, $ubicacion, $usuario_alta, $fecha_alta, $estado, $prioridad){
		
		$sql = "INSERT INTO `post`
		(`tipo`,
		 `titulo`,
		 `descripcion`,
		 `anio_proyecto`,
		 `proyecto`,
		 `ejecucion`,
		 `construccion_direccion`,
		 `disenio_dim_estruc`,
		 `tipologia`,
		 `disenio_dim_clim`,
		 `area`,
		 `ubicacion`,
		 `usuario_alta`,
		 `fecha_alta`,
		 `estado`,
		 `prioridad`)
		VALUES ('2',
			'$titulo',
			'$descripcion',
			'$anio_proyecto',
			'$proyecto',
			'$ejecucion',
			'$construccion_direccion',
			'$disenio_dim_estruc',
			'$tipologia',
			'$disenio_dim_clim',
			'$area',
			'$ubicacion',
			'$usuario_alta',
			'$fecha_alta',
			'$estado',
			$prioridad)";

		$query = $this->db->query($sql);
		$insert = $this->db->affected_rows();

		return ($insert == 1) ? $this->db->insert_id() : 0;

	}



	function alta_traduccion($id, $titulo = null, $descripcion = null, $proyecto = null, $ubicacion = null){
		$sql = "INSERT INTO post_traducciones
				(id_post,
				titulo,
				descripcion,
				proyecto,
				ubicacion)
			VALUES (
				$id,
				'$titulo',
				'$descripcion',
				'$proyecto',
				'$ubicacion')";
		$query = $this->db->query($sql);
		$insert = $this->db->affected_rows();
		return ($insert == 1) ? $this->db->insert_id() : 0;
	}




	function baja_proyecto($id){
		$sql = "DELETE FROM post WHERE id = $id";
		$query = $this->db->query($sql);
		$baja = $this->db->affected_rows();
		return ($baja == 1) ? 1 : 0;
	}

	function get_configuracion(){
		$sql = "SELECT valor FROM configuracion WHERE campo = 'proyectos en pagina'";
		$query1 = $this->db->query($sql);
		$cantidad = $query1->result_array();

		$sql = "SELECT valor FROM configuracion WHERE campo = 'orden proyectos'";
		$query2 = $this->db->query($sql);
		$orden = $query2->result_array();

		$conf['cantidad'] = $cantidad[0];
		$conf['orden'] = $orden[0];
		return $conf;
	}

	function guardar_configuracion($cantidad, $orden){
		$sql = "UPDATE configuracion SET valor = '$cantidad' WHERE campo = 'proyectos en pagina' ";
		$query = $this->db->query($sql);

		$sql = "UPDATE configuracion SET valor = '$orden' WHERE campo = 'orden proyectos' ";
		$query = $this->db->query($sql);
	}


	public function obtener_cantidad_publicados(){
		$sql = "SELECT 
				count(*) as cantidad
			FROM post
			WHERE estado = 1
			AND tipo = 2";
		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function modificacionProyecto($id, $titulo, $descripcion, $anio_proyecto, $proyecto, $ejecucion, $construccion_direccion, $disenio_dim_estruc, $tipologia, $disenio_dim_clim, $area, $ubicacion, $usuario_modif, $fecha_modif, $estado, $prioridad){
		$sql = "UPDATE post  SET
		`titulo` = '$titulo',
		`descripcion` = '$descripcion',
		`anio_proyecto` = '$anio_proyecto',
		`proyecto` = '$proyecto',
		`ejecucion` = '$ejecucion',
		`construccion_direccion` = '$construccion_direccion',
		`disenio_dim_estruc` =  '$disenio_dim_estruc',
		`tipologia` = '$tipologia',
		`disenio_dim_clim` = '$disenio_dim_clim',
		`area` = '$area',
		`ubicacion` = '$ubicacion',
		`usuario_modificacion` = '$usuario_modif',
		`fecha_modificacion` = '$fecha_modif',
		`estado` = $estado,
		`prioridad` = $prioridad
		WHERE `id` = $id";
		
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
			descripcion = '$descripcion',
			proyecto = '$proyecto',
			ubicacion = '$ubicacion',
			tipologia = '$tipologia'
			WHERE id_post = $id";
			$query = $this->db->query($sql);
			$update = $this->db->affected_rows();
			return ($update != 1) ? 0 : 1;
		else:
			$sql = "INSERT INTO post_traducciones
				(id_post,
				titulo,
				descripcion,
				proyecto,
				ubicacion)
			VALUES (
				$id,
				'$titulo',
				'$descripcion',
				'$proyecto',
				'$ubicacion')";
			$query = $this->db->query($sql);
			$insert = $this->db->affected_rows();
			return ($insert == 1) ? 1 : 0;
			
		endif;

	}


	public function obtener_proyectos($cantidad = null){
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
				prioridad
			FROM post p
			WHERE  p.tipo = 2
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