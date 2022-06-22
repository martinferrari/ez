<?php  header('Content-type: text/html; charset=UTF-8'); ?> 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	*	Establece texto y tipo de mensaje emergente.
	*	Si el texto es NULL y el tipo es error, el mensaje por defecto es "Ocurrió un error."
	*/
	if ( ! function_exists('establecer_mensaje_emergente')):
		function establecer_mensaje_emergente($texto = NULL, $tipo) {
			$CI =& get_instance();
			
			if($texto == NULL and $tipo == "error"):
				$texto = "Se produjo un error.";
			endif;
			
			$CI->session->set_userdata(array('mensaje_emergente_texto' => $texto, "mensaje_emergente_tipo" => $tipo));
		}//obtener_mensaje_emergente
	endif; 
	
	
	if ( ! function_exists('obtener_mensaje_emergente')):
		function obtener_mensaje_emergente() {			
			
			$CI =& get_instance();
			
			$mensaje['texto'] = $CI->session->userdata('mensaje_emergente_texto');
			$mensaje['tipo'] = $CI->session->userdata('mensaje_emergente_tipo');
			
			$CI->session->set_userdata(array('mensaje_emergente_texto' => "",'mensaje_emergente_tipo' => ""));
			
			return $mensaje;
		}//obtener_mensaje_emergente
	endif; 

	if ( ! function_exists('reg_expresion')):
		function reg_expresion($variable) {
			$especial = array("á", "é", "í", "ó", "ú","Á","É","Í","Ó","Ú","Ñ","ñ");
			$html   = array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;","&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;","&Ntilde","&ntilde");

			$variable = str_replace($especial, $html, $variable);
			$variable = utf8_encode($variable);
			return $variable;
		}


		

	endif;
	

	if ( ! function_exists('rmdir_recursive')):
		//Borra directorio con archivos
		function rmdir_recursive($dir) {
			foreach(scandir($dir) as $file) {
				if ('.' === $file || '..' === $file) continue;
				if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
				else unlink("$dir/$file");
			}
			rmdir($dir);
		}
	endif;
	
	
	


	
	
	
?>