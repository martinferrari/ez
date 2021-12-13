<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Contacto_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();

	}

    public function alta_entrevista($nombre,$telefono, $profesion, $email, $direccion, $medidas, $motivo, $mensaje, $conocio){
	
		$sql = "INSERT INTO contacto_entrevista
        (nombre,
         telefono,
         profesion,
         email,
         direccion,
         medidas,
         motivo,
         mensaje,
         conocido_por)
        VALUES ( 
        '$nombre',
        '$telefono',
        '$profesion',
        '$email',
        '$direccion',
        '$medidas',
        '$motivo',
        '$mensaje',
        '$conocio')";

		$query = $this->db->query($sql);

	}


    public function alta_trabaja($nombre, $dni,$fecha_nac, $lugar_nac,$direccion, $estado_civil, $hijos, $telefono, $profesion, $entidad, $email, $primer_trabajo, $trabajo_ant, $posee_titulo_uni, $posee_matricula, $posee_movilidad, $posee_lic_conducir, $tipo_medio, $tipo_licencia, $dispo_horaria, $conoce_estudio, $conoce_obras, $obra_ident, $como_informo_vacante, $sigue_face, $sigue_insta, $face, $insta){
	
		$sql = "INSERT INTO contacto_trabaja
        (nombre,
         dni,
         fecha_nac,
         lugar_nac,
         direccion,
         estado_civil,
         hijos,
         telefono,
         profesion,
         entidad_titulo,
         email,
         primer_trabajo,
         trabajo_anterior,
         posee_titulo_uni,
         posee_matricula,
         posee_movilidad,
         posee_lic_conducir,
         tipo_medio,
         tipo_licencia,
         dispo_horaria,
         conoce_estudio,
         conoce_obras,
         obra_ident,
         como_informo_vacante,
         sigue_face,
         sigue_insta,
         face,
         insta)
    VALUES (
        '$nombre',
        '$dni',
        '$fecha_nac',
        '$lugar_nac',
        '$direccion',
        '$estado_civil',
        '$hijos',
        '$telefono',
        '$profesion',
        '$entidad',
        '$email',
        '$primer_trabajo',
        '$trabajo_ant',
        '$posee_titulo_uni',
        '$posee_matricula',
        '$posee_movilidad',
        '$posee_lic_conducir',
        '$tipo_medio',
        '$tipo_licencia',
        '$dispo_horaria',
        '$conoce_estudio',
        '$conoce_obras',
        '$obra_ident',
        '$como_informo_vacante',
        '$sigue_face',
        '$sigue_insta',
        '$face',
        '$insta')";

		$query = $this->db->query($sql);

	}



    function obtener_entrevistas(){
        $sql = "SELECT * FROM contacto_entrevista";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function obtener_trabaja(){
        $sql = "SELECT * FROM contacto_trabaja";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


}