<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/*
	*	Envia emails
	*	Recibe el array $data con los parametros:
	*		- titulo: titulo del correo
	*		- mensaje: cuerpo del mensaje a enviar
	*		
	*	Devuelve
	*		TRUE: si el email se envio
	*		FALSE: si el email no se envio
	*
	*/
	if ( ! function_exists('enviar_email')){
		function enviar_email($data){
			
			$cuenta_email = "info@ezestudio.com.ar";
						
			$CI = &get_instance();
			
			//$to = $cuenta_email;
			$to = 'martinferrari85@gmail.com';
			$subject = $data['titulo'];
			$email_cuerpo =  $data['mensaje'];
			
			
			$config["smtp_host"] = 'c1570807.ferozo.com';
			$config["smtp_user"] = 'info@ezestudio.com.ar';
			$config["smtp_pass"] = 'Salta1349';
			$from_email = 'info@ezestudio.com.ar';
			
			
			//Cargamos la librer�a email
			$CI->load->library('email');
			$config['protocol']  = 'smtp';
			//$config['charset']   = 'utf-8';
			$config['charset'] = 'iso-8859-1';
			//Permitimos que se puedan cortar palabras
			$config['wordwrap']  = TRUE;		 
			//El email debe ser valido
			$config['validate']  = true;
			$config['mailtype']  = "html";
			
			//Establecemos esta configuraci�n
			$CI->email->initialize($config);		
			//Ponemos la direcci�n de correo que enviar� el email y un nombre
			$CI->email->from($from_email, 'EZ Estudio');
		
			
			$email_head = '
			<html>
				<head>
				<meta charset="utf-8">
				<style type="text/css">
					
					
				</style>
				</head>
			
				<body>
					<table>
						<tbody>
							<tr>
								
							</tr>
						</tbody>
					</table>
					
					<table class="">
						<tbody>
							';

			$email_footer = '	
						</tbody>
					</table>
							
					<table class="footer">
						<tbody>
							<tr>
								
							</tr>
							<tr style="height:100px;text-align:center;">
								<td>
									
								</td>
							</tr>
						</tbody>
					</table>
				</body>
			</html>
			';

		
			$CI->email->to($to, 'CLIENTE'); 
			//Definimos el asunto del mensaje		
			$CI->email->subject($subject);
			
			$email = $email_head.$email_cuerpo.$email_footer;
			$CI->email->message($email);


			if($CI->email->send()){
				$valor = true;
			}else{
				$valor = false;
				$valor = $CI->email->print_debugger(); //muestra los errores
			}

			return $valor;
		
	
		
		}//enviar_email
	} //if ( ! function_exists('enviar_email')){
	

	
?>