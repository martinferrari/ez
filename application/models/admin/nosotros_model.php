<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Nosotros_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}


	public function alta_nosotros($nombre, $apellido, $cargo, $estado){
	
		$sql = "
        INSERT INTO nosotros
        (nombre,
         apellido,
         cargo,
         estado)
        VALUES (
            '$nombre',
            '$apellido',
            '$cargo',
            '$estado')";

		$query = $this->db->query($sql);
		$insert = $this->db->affected_rows();

		return ($insert == 1) ? $this->db->insert_id() : 0;

	}

	function baja_nosotros($id){
		$sql = "DELETE FROM nosotros WHERE id = $id";
		$query = $this->db->query($sql);
		$baja = $this->db->affected_rows();
		return ($baja == 1) ? 1 : 0;
	}


	public function modificacionNosotros($id, $nombre, $apellido, $cargo, $estado){
		$sql = "
        UPDATE nosotros
        SET nombre = '$nombre',
          apellido = '$apellido',
          cargo = '$cargo',
          estado = $estado
        WHERE id = '$id'";
		echo $sql;
		$query = $this->db->query($sql);
		$update = $this->db->affected_rows();
		
		return ($update != 1) ? 0 : 1;
	}

	function modificacion_traduccion($id, $cargo){

			$sql = "UPDATE nosotros
			SET 
			cargo_traducido = '$cargo'
			WHERE id = $id";
			$query = $this->db->query($sql);
			$update = $this->db->affected_rows();
			return ($update != 1) ? 0 : 1;
	}




	public function obtener_cantidad_publicados(){
		$sql = "SELECT 
				count(*) as cantidad
			FROM nosotros
			WHERE estado = 1";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function obtener_nosotros($cantidad = null, $estado = null, $order = null){
        $cantidad = ($cantidad == null) ? 9999999 : $cantidad;
		$where_estado = ($estado == null) ? "" : " AND estado = $estado ";
		$order = ($order == NULL) ? " id DESC " : $order;

		$sql = "SELECT 
				id,
                nombre,
                apellido,
                cargo,
                foto1,
				foto2,
				foto3,
                estado,
				cargo_traducido
			FROM nosotros
			WHERE 1=1
			$where_estado
			ORDER BY $order
			LIMIT $cantidad ";
		$res = $this->db->query($sql);
		return $res->result_array();
	}


	function obtener_traduccion($id){
		$sql = "SELECT cargo_traducido FROM nosotros WHERE id = $id";
		$res = $this->db->query($sql);
		return $res->result();
	}




}//eof