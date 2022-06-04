<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Cotizacion_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}


    function guardar_cabecera($data){
        $nombre = $data['nombre'];
        $telefono = $data['telefono'];
        $email = $data['email'];

        $sql = "INSERT INTO cotizacion
        (nombre_apellido,
         telefono,
         email)
        VALUES ('$nombre',
            '$telefono',
            '$email')";

        $query = $this->db->query($sql);
        $insert = $this->db->affected_rows();
        return ($insert == 1) ? $this->db->insert_id() : 0;
    }

    function guardar_detalle($data){


        $sql = "INSERT INTO cotizacion_detalle
         (id_cotizacion,
             producto,
             cantidad,
             unidad)
        VALUES $data";

        $query = $this->db->query($sql);
        $insert = $this->db->affected_rows();
        return ($insert == 1) ? $this->db->insert_id() : 0;
    }


    function baja_producto($id){
        $sql = "DELETE FROM mosaico WHERE id = $id";
		$query = $this->db->query($sql);
		$baja = $this->db->affected_rows();
		return ($baja == 1) ? 1 : 0;
    }

    function modificacion_detalle_cotizacion($id_detalle, $cantidad, $unidad, $precio){
        $id_detalle = reg_expresion($id_detalle);
        $cantidad = reg_expresion($cantidad);
        $unidad = reg_expresion($unidad);
        $precio = reg_expresion($precio);

        $sql = "UPDATE cotizacion_detalle SET 
        cantidad_cotizada = '$cantidad',
        precio_cotizado = '$precio',
        unidad_cotizada = '$unidad'
        WHERE id = $id_detalle";
        $query = $this->db->query($sql);
        $update = $this->db->affected_rows();

        return ($update != 1) ? 0 : 1;
    }

    function modificacion_producto($data){
        $id = reg_expresion($data['id']);
        $codigo = reg_expresion($data['codigo']);
        $formato = reg_expresion($data['formato']);
        $espesor = reg_expresion($data['espesor']);
        $dimension_hoja = reg_expresion($data['dimension_hoja']);
        $peso = reg_expresion($data['peso']);
        $m2_por_caja = reg_expresion($data['m2_por_caja']);
        $junta = reg_expresion($data['junta']);
        $color = reg_expresion($data['color']);
        $estado = reg_expresion($data['estado']);
        $categoria = reg_expresion($data['categoria']);
        $detalle = reg_expresion($data['detalle']);

        $sql = "UPDATE mosaico
        SET
          codigo = '$codigo',
          formato = '$formato',
          espesor = '$espesor',
          dimension_hoja = '$dimension_hoja',
          peso = '$peso',
          m2_por_caja = '$m2_por_caja',
          junta = '$junta',
          color = '$color',
          estado = '$estado',
          categoria = '$categoria',
          detalle = '$detalle'
        WHERE id = $id ";

        $query = $this->db->query($sql);
        $update = $this->db->affected_rows();

        return ($update != 1) ? 0 : 1;
    }


    function obtener_catalogo(){
        $sql = "SELECT * FROM mosaico m
        JOIN visuales_mosaico vm ON vm.id_mosaico = m.id 
        WHERE m.estado = 1 AND vm.es_destacada = 1";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function obtener_productos(){
        $sql = "SELECT * FROM mosaico";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function obtener_cotizaciones(){
        $sql = "SELECT
        c.id,
        c.nombre_apellido,
        c.telefono,
        c.email,
        c.estado
        FROM cotizacion c ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function obtener_detalle($id){
        $sql = "SELECT
            d.id,
            producto,
            cantidad,
            unidad,
            cantidad_cotizada,
            precio_cotizado,
            unidad_cotizada,
            m.codigo
        FROM cotizacion_detalle d
        JOIN mosaico m ON m.id = d.producto
        WHERE id_cotizacion = $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function set_cotizacion_cotizada($id){
        $sql = "UPDATE cotizacion
        SET
          estado = 2
        WHERE id = $id ";

        $query = $this->db->query($sql);
        $update = $this->db->affected_rows();

        return ($update != 1) ? 0 : 1;
    }

}