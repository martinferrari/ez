<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Obras_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}

	public function alta_obra($titulo, $descripcion, $anio_proyecto, $proyecto, $ejecucion, $construccion_direccion, $disenio_dim_estruc, $tipologia, $disenio_dim_clim, $area, $ubicacion, $usuario_alta, $fecha_alta, $estado, $direccion_tecnica, $asist_tec_obra,$estructuras, $instalaciones,$gestion_documentacion, $sup_terreno,$sup_cubierta, $anio_finalizacion, $fotografia){
	
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
		 `direccion_tecnica`,
		 `asist_tec_obra`,
		 `estructuras`,
		 `instalaciones`,
		 `gestion_documentacion`,
		 `sup_terreno`,
		 `sup_cubierta`,
		 `anio_finalizacion`,
		 `fotografia`)
		VALUES ('1',
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
			'$direccion_tecnica',
			'$asist_tec_obra',
			'$estructuras',
			'$instalaciones',
			'$gestion_documentacion',
			'$sup_terreno',
			'$sup_cubierta',
			'$anio_finalizacion',
			'$fotografia')";

		$query = $this->db->query($sql);
		$insert = $this->db->affected_rows();

		return ($insert == 1) ? $this->db->insert_id() : 0;

	}


	function baja_obra($id){
		$sql = "DELETE FROM post WHERE id = $id";
		$query = $this->db->query($sql);
		$baja = $this->db->affected_rows();
		return ($baja == 1) ? 1 : 0;
	}

	

	public function modificacionObra($id, $titulo, $descripcion, $anio_proyecto, $proyecto, $ejecucion, $construccion_direccion, $disenio_dim_estruc, $tipologia, $disenio_dim_clim, $area, $ubicacion, $usuario_modif, $fecha_modif, $estado, $direccion_tecnica, $asist_tec_obra,$estructuras, $instalaciones,$gestion_documentacion, $sup_terreno,$sup_cubierta, $anio_finalizacion, $fotografia){
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
		`direccion_tecnica` = '$direccion_tecnica',
		`asist_tec_obra` = '$asist_tec_obra',
		`estructuras` = '$estructuras',
		`instalaciones` = '$instalaciones',
		`gestion_documentacion` = '$gestion_documentacion',
		`sup_terreno` = '$sup_terreno',
		`sup_cubierta` = '$sup_cubierta',
		`anio_finalizacion` = '$anio_finalizacion',
		`fotografia` = '$fotografia'
		WHERE `id` = $id";
		echo $sql;
		$query = $this->db->query($sql);
		$update = $this->db->affected_rows();
		
		return ($update != 1) ? 0 : 1;
	}


	public function obtener_obras($cantidad = null){
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
			WHERE p.tipo = 1
			ORDER BY p.fecha_alta DESC
			LIMIT $cantidad ";
		$res = $this->db->query($sql);
		return $res->result_array();
	}




}//eof