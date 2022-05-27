<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Murvi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}


    function alta_producto($data){
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

        $sql = "INSERT INTO mosaico(
         codigo,
         formato,
         espesor,
         dimension_hoja,
         peso,
         m2_por_caja,
         junta,
         color,
         estado,
         categoria
         ) VALUES (
        '$codigo',
        '$formato',
        '$espesor',
        '$dimension_hoja',
        '$peso',
        '$m2_por_caja',
        '$junta',
        '$color',
        '$estado',
        '$categoria' )";

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
          categoria = '$categoria'
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



}