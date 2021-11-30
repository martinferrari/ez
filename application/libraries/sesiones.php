<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*	En esta clase se definen los metodos relacionados a sesiones
*/

class sesiones{

	public function __construct(){
    	$this->CI =& get_instance();
        $this->CI->load->database();
  	}
	
		
	/*
	*	Valida si existe una sesion iniciada
	*/
	public function valida_sesion($origen=null){
	
		$CI =& get_instance();

		if (!$CI->session->userdata('logged_user_id')):
			redirect('admin');
		endif;
		
	
	}//valida_sesion
	
	
	
	/**
	*	Valida si existe una sesion iniciada. Si existe, retorna 1, Si no existe retorna 0
	*	Es igual a la funcion refsa_valida_sesion, con la diferencia que en vez de hacer un redirect, retorna un valor
	*/
	public function valida_sesion_return($origen=null){
	
		$CI =& get_instance();
		$retorno = 1;

		if (!$CI->session->userdata('logged_user_id')):
			$retorno = 0;
		endif;
		
		return $retorno;
	
	}//valida_sesion_return
	
	
	/*
	*	Si existe una sesion iniciada, redirecciona a Home
	*/
	public function existe_sesion($origen=null){
	
		$CI =& get_instance();
		if ($CI->session->userdata('logged_user_id')):
			redirect('admin/home');
		endif;
	}//existe_sesion
	
	
	
}//EOF